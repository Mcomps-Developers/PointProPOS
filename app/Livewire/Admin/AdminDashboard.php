<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use App\Models\Repayment;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $collection = Company::orderByDesc('created_at')->limit(10)->get();
        $countClients = Company::count();
        $activeClients = Company::where('renewal_date', '>=', Carbon::now())->count();
        $transactions = Repayment::all();
        return view('livewire.admin.admin-dashboard', ['transactions' => $transactions, 'collection' => $collection, 'countClients' => $countClients, 'activeClients' => $activeClients])->layout('layouts.base');
    }
}
