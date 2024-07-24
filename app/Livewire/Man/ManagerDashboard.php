<?php

namespace App\Livewire\Man;

use App\Models\Company;
use App\Models\CompanyWallet;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Repayment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManagerDashboard extends Component
{
    public function render()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $products = Product::orderBy('name')->where('company_id', $company->id)->get();
        $customers = User::where('company_id', $company->id)->where('utype', 'cst')->count();
        $invoices = Invoice::orderByDesc('created_at')->where('company_id', $company->id)->count();
        $repayments = Repayment::orderByDesc('created_at')->where('company_id', $company->id)->limit(4)->get();
        $wallet = CompanyWallet::where('company_id', $company->id)->get();
        return view('livewire.man.manager-dashboard', ['products' => $products, 'customers' => $customers, 'invoices' => $invoices, 'wallet' => $wallet, 'repayments' => $repayments])->layout('layouts.base');
    }
}
