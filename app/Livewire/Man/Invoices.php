<?php

namespace App\Livewire\Man;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Invoices extends Component
{
    public $name;
    public $email;
    public $phone_number;
    public $status;
    public $first_repayment_date;
    public $repayment_frequency;
    public $debtBalance = 0;
    public $discount = 0;
    public $shipping_fee = 0;
    private $user_id;
    public $productName = '';
    public $loanType;

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            Cart::instance('cart')->add($product->id, $product->name, 1, $product->price)->associate('App\Models\Product');
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
            $pendingInvoices = Invoice::where([
                'user_id' => $user->id,
                'status' => 'pending'
            ])->get();
            $this->debtBalance = $pendingInvoices->sum('amount');
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

    public function rules()
    {
        return [
            'email' => 'required|email',
            'discount' => 'nullable|numeric',
            'shipping_fee' => 'nullable|numeric',
            'repayment_frequency' => 'required',
            'first_repayment_date' => 'required|date',
            'status' => 'required',
            'loanType' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function create()
    {
        $this->validate();
        $this->handleUser();
        $this->calculateAmount();
        try {
            $company = Company::where('user_id', Auth::id())->first();
            $invoice = new Invoice();
            $invoice->company_id = $company->id;
            $invoice->user_id = $this->user_id;
            $invoice->type = $this->loanType;
            $invoice->status = $this->status;
            $invoice->first_repayment_date = $this->first_repayment_date;
            $invoice->amount = $this->totalAfterDiscount;
            $invoice->repayment_frequency = $this->repayment_frequency;
            // $invoice->reference = $this->status;
            $invoice->save();
            notyf()->position('y', 'top')->success('Loan processed successfully.');
            return redirect()->to(request()->header('referer'));
        } catch (\Illuminate\Database\QueryException $ex) {
            Log::error('Database error: ' . $ex->getMessage() . ' in ' . $ex->getFile() . ' on line ' . $ex->getLine());
            notyf()->position('y', 'top')->error('Database error occurred. Please try again later.');
            return redirect()->to(request()->header('referer'));
        } catch (\Exception $ex) {
            Log::error('Exception Error. Details: ' . $ex->getMessage() . ' in ' . $ex->getFile() . ' on line ' . $ex->getLine());

            notyf()->position('y', 'top')->error('An unexpected error occurred. Please try again later.');
            return redirect()->to(request()->header('referer'));
        }
    }

    // Variables
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    private function calculateAmount()
    {
        $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
        $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
        $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
    }
    public function increaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::update($rowId, $item->qty + 1);
    }

    public function decreaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        if ($item->qty > 1) {
            Cart::update($rowId, $item->qty - 1);
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
        $invoices = Invoice::orderByDesc('created_at')->get();
        $customers = User::where('company_id', $company->id)->where('utype', 'cst')->get();
        $products = Product::orderBy('name')
            ->where('company_id', $company->id)
            ->where('name', 'like', '%' . $this->productName . '%')
            ->get();
        return view('livewire.man.invoices', ['invoices' => $invoices, 'customers' => $customers, 'products' => $products])->layout('layouts.base');
    }
}
