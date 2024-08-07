<?php

namespace App\Livewire\Cst;

use App\Models\Invoice;
use App\Models\PaymentSchedule;
use App\Models\Repayment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CstDashboard extends Component
{
    use WithPagination;
    public function render()
    {
        $invoices = Invoice::where('user_id', Auth::id())->limit(6)->get();
        $paidAmount = PaymentSchedule::whereHas('invoice', function ($query) {
            $query->where('user_id', Auth::id());
        })->sum('amount_paid');
        $repayments = Repayment::where('user_id', Auth::id())->limit(4)->get();
        $user = User::findOrFail(Auth::id());
        $unreadNotifications = $user->unreadNotifications;
        return view('livewire.cst.cst-dashboard', ['invoices' => $invoices, 'paidAmount' => $paidAmount, 'repayments' => $repayments, 'unreadNotifications' => $unreadNotifications])->layout('layouts.app');
    }
}
