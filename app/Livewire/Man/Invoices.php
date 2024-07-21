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

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            Cart::instance('cart')->add($product->id, $product->name, 1, $product->price)->associate('App\Models\Product');
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
        try {
            $company = Company::where('user_id', Auth::id())->first();
            $category = new Invoice();
            $category->company_id = $company->id;
            $category->name = $this->name;
            $category->status = $this->status;
            $category->save();
            notyf()->position('y', 'top')->success('Category created successfully.');
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
        session()->flash('success', 'Product successfully removed from cart');
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
