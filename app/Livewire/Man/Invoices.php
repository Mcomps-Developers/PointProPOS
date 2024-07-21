<?php

namespace App\Livewire\Man;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Invoices extends Component
{
    public $name;
    public $email;
    public $phone_number;
    public $status;
    public $firt_repayment_date;
    public $repayment_frequency;
    public $debtBalance = 0;
    private $user_id;


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
            notyf()->position('y', 'top')->success('Success! Client found in your database!');
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
            'status' => 'required',
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
    public function render()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $invoices = Invoice::orderByDesc('created_at')->get();
        $customers = User::where('company_id', $company->id)->where('utype', 'cst')->get();
        return view('livewire.man.invoices', ['invoices' => $invoices, 'customers' => $customers])->layout('layouts.base');
    }
}
