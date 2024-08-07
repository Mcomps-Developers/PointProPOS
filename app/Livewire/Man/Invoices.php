<?php

namespace App\Livewire\Man;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\PaymentSchedule;
use App\Models\Product;
use App\Models\User;
use App\Notifications\newCredit;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;

class Invoices extends Component
{
    public $name;
    public $email;
    public $phone_number;
    public $status;
    public $first_repayment_date;
    public $repayment_frequency;
    public $debtBalance = 0;
    public $discount = 0.0;
    public $shipping_fee = 0.0;
    private $user_id;
    public $productName = '';
    public $loanType;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    private $reference;
    public $duration;
    public $quantity = 1;
    protected $rules = [
        'email' => 'required|email',
        'discount' => 'nullable|numeric',
        'shipping_fee' => 'nullable|numeric',
        'repayment_frequency' => 'required',
        'first_repayment_date' => 'required|date',
        'status' => 'required',
        'loanType' => 'required',
        'duration' => 'required|numeric',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            // Explicitly cast price and qty to numeric types
            $price = (float) $product->price;
            $qty = (int) $this->quantity;

            Cart::instance('cart')->add($product->id, $product->name, $qty, $price)->associate('App\Models\Product');
            $this->reset('productName');
            notyf()->position('y', 'top')->success('Product added to cart successfully!');
        }
    }


    // Check User
    public function CheckUser()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $user = User::where([
            'email' => $this->email,
            'company_id' => $company->id,
        ])->first();

        if ($user) {
            $this->name = $user->name;
            $this->phone_number = $user->phone_number;

            // Check for pending debts
            $loanStatusesToExclude = ['complete', 'cancelled', 'pending'];
            $pendingInvoices = Invoice::where('user_id', $user->id)
                ->whereNotIn('status', $loanStatusesToExclude)
                ->get();

            $debtBalance = 0;

            foreach ($pendingInvoices as $invoice) {
                $totalAmountPaid = $invoice->repayments()->sum('amount_paid');
                $remainingBalance = $invoice->amount - $totalAmountPaid;
                $debtBalance += $remainingBalance;
            }
            $this->debtBalance = $debtBalance;

            notyf()->position('y', 'top')->success('Client found in your database!');
        } else {
            $this->reset('email');
            notyf()->position('y', 'top')->error('Client not found!');
        }
    }


    private function handleUser()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $user = User::where([
            'email' => $this->email,
            'company_id' => $company->id,
        ])->first();

        if ($user) {
            $this->name = $user->name;
            $this->phone_number = $user->phone_number;
            $this->user_id = $user->id;
        }
    }

    public function validateInput()
    {
        $this->validate();
        $this->create();
    }
    private function create()
    {
        try {
            // Validate inputs
            $this->validate();

            // Handle user-related actions (if any)
            $this->handleUser();

            // Calculate amounts and validate them
            $this->calculateAmount();

            // Generate reference for the invoice
            $this->generateReference();

            // Generate payment schedules
            $paymentSchedules = $this->generatePaymentSchedules(
                $this->first_repayment_date,
                $this->repayment_frequency,
                $this->totalAfterDiscount,
                $this->duration
            );

            // Begin transaction for atomicity
            DB::beginTransaction();

            try {
                // Create invoice
                $company = Company::where('user_id', Auth::id())->first();
                $invoice = new Invoice();
                $invoice->company_id = $company->id;
                $invoice->user_id = $this->user_id;
                $invoice->type = $this->loanType;
                $invoice->status = $this->status;
                $invoice->first_repayment_date = $this->first_repayment_date;
                $invoice->amount = $this->totalAfterDiscount;
                $invoice->repayment_frequency = $this->duration;
                $invoice->reference = $this->reference;
                $invoice->subtotal = str_replace(',', '', Cart::instance('cart')->subtotal());
                $invoice->discount = $this->discount;
                $invoice->tax = $this->taxAfterDiscount;
                $invoice->save();

                // Add products from cart to invoice (if needed)
                foreach (Cart::instance('cart')->content() as $item) {
                    $invoiceProduct = new InvoiceProduct();
                    $invoiceProduct->invoice_id = $invoice->id;
                    $invoiceProduct->product_id = $item->id;
                    $invoiceProduct->amount = $item->price;
                    $invoiceProduct->qty = $item->qty;
                    $invoiceProduct->save();
                }

                // Save payment schedules related to the invoice
                foreach ($paymentSchedules as $schedule) {
                    $paymentSchedule = new PaymentSchedule();
                    $paymentSchedule->invoice_id = $invoice->id;
                    $paymentSchedule->amount = $schedule['amount'];
                    $paymentSchedule->date_due = $schedule['date_due'];
                    $paymentSchedule->payment_date = $schedule['payment_date'];
                    $paymentSchedule->status = $schedule['status'];
                    $paymentSchedule->save();
                }
                $user = User::findOrFail($invoice->user_id);
                $company = Company::findOrFail($invoice->company_id);
                $frequency = $this->repayment_frequency;
                $user->notify(new newCredit($user, $invoice, $company, $frequency));
                // Commit transaction
                DB::commit();
                Cart::instance('cart')->destroy();
                // Success notification
                notyf()->position('y', 'top')->success('Loan processed successfully.');
                return redirect()->to(request()->header('referer'));
            } catch (\Exception $ex) {
                // Rollback transaction on failure
                DB::rollBack();
                Log::error('Error: ' . $ex->getMessage());
                notyf()->position('y', 'top')->error('An unexpected error occurred. Please try again later.');
                return redirect()->to(request()->header('referer'));
            }
        } catch (\Exception $ex) {
            // Handle other exceptions
            Log::error('Error: ' . $ex->getMessage());
            notyf()->position('y', 'top')->error('An unexpected error occurred. Please try again later.');
            return redirect()->to(request()->header('referer'));
        }
    }


    private function generatePaymentSchedules($firstRepaymentDate, $repaymentFrequency, $amount, $duration)
    {
        $paymentSchedules = [];
        $amountPerInstallment = floor($amount / $duration);
        $remainder = $amount % $duration;

        $dueDate = new DateTime($firstRepaymentDate);

        for ($i = 1; $i <= $duration; $i++) {
            switch ($repaymentFrequency) {
                case 'daily':
                    break;
                case 'weekly':
                    break;
                case 'monthly':
                    break;
                default:
                    break;
            }

            $installmentAmount = $amountPerInstallment;


            if ($remainder > 0) {
                $installmentAmount += 1;
                $remainder--;
            }

            $paymentSchedules[] = [
                'amount' => $installmentAmount,
                'date_due' => $dueDate->format('Y-m-d'),
                'payment_date' => null,
                'status' => 'not_paid',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            switch ($repaymentFrequency) {
                case 'daily':
                    $dueDate->modify('+1 day');
                    break;
                case 'weekly':
                    $dueDate->modify('+1 week');
                    break;
                case 'monthly':
                    $dueDate->modify('+1 month');
                    break;
                default:
                    break;
            }
        }

        return $paymentSchedules;
    }



    private function calculateAmount()
    {
        $subtotal = str_replace(',', '', Cart::instance('cart')->subtotal());
        $subtotal = (float) $subtotal;
        $this->subtotalAfterDiscount = $subtotal - $this->discount;
        $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
        $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        $this->totalAfterDiscount = round($this->totalAfterDiscount);
        if ($this->totalAfterDiscount < 0) {
            notyf()->position('y', 'top')->error('The total amount cannot be negative.');
            throw new \Exception('The total amount cannot be negative.');
        }
    }



    private function generateReference()
    {
        do {
            $this->reference = Str::random(5);
        } while (Invoice::where('reference', $this->reference)->exists());
    }
    public function increaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->update($rowId, $item->qty + 1);

    }

    public function decreaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        if ($item->qty > 1) {
            Cart::instance('cart')->update($rowId, $item->qty - 1);

        }
    }
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        notyf()->position('y', 'top')->success('Product removed from cart.');
    }
    public function render()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $invoices = Invoice::orderByDesc('created_at')->where('company_id', $company->id)->get();
        $customers = User::where('company_id', $company->id)->where('utype', 'cst')->get();
        $products = Product::orderBy('name')
            ->where('company_id', $company->id)
            ->where('name', 'like', '%' . $this->productName . '%')
            ->get();
        return view('livewire.man.invoices', ['invoices' => $invoices, 'customers' => $customers, 'products' => $products])->layout('layouts.base');
    }
}
