<?php

namespace App\Livewire\Man;

use App\Models\Invoice;
use App\Models\PaymentSchedule;
use Livewire\Component;

class InvoiceDetails extends Component
{
    public $reference;
    public function mount($reference)
    {
        $this->reference = $reference;
    }
    public function render()
    {
        $invoice = Invoice::where('reference', $this->reference)->first();
        $schedules = PaymentSchedule::where('invoice_id', $invoice->id)->get();
        return view('livewire.man.invoice-details', ['invoice' => $invoice, 'schedules' => $schedules])->layout('layouts.base');
    }
}
