<?php

namespace App\Livewire\Cst;

use App\Models\Repayment;
use Livewire\Component;

class TransactionDetails extends Component
{
    public $tracking_id;
    public function render()
    {
        $transaction = Repayment::where('tracking_id', $this->tracking_id)->first();
        return view('livewire.cst.transaction-details', ['transaction' => $transaction])->layout('layouts.app');
    }
}
