<?php

namespace App\Livewire\Cst;

use App\Models\Repayment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Transactions extends Component
{
    use WithPagination;
    public function render()
    {
        $transactions = Repayment::where('user_id', Auth::id())->paginate(12);
        return view('livewire.cst.transactions', ['transactions' => $transactions])->layout('layouts.app');
    }
}
