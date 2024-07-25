<?php

namespace App\Livewire\Cst;

use App\Models\Invoice;
use App\Models\PaymentSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CstDashboard extends Component
{
    use WithPagination;
    public function render()
    {
        $invoices = Invoice::where('user_id', Auth::id())->paginate(6);
        $paidAmount = PaymentSchedule::whereHas('invoice', function ($query) {
            $query->where('user_id', Auth::id());
        })->sum('amount_paid');
        return view('livewire.cst.cst-dashboard', ['invoices' => $invoices, 'paidAmount' => $paidAmount])->layout('layouts.app');
    }
}
