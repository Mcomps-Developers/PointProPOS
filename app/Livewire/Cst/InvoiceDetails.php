<?php

namespace App\Livewire\Cst;

use App\Models\Invoice;
use App\Models\InvoiceProduct;
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
        $schedules = PaymentSchedule::orderByRaw('date_due')->where('invoice_id', $invoice->id)->get();
        $products = InvoiceProduct::where('invoice_id', $invoice->id)->get();
        return view('livewire.cst.invoice-details', ['invoice' => $invoice, 'schedules' => $schedules, 'products' => $products])->layout('layouts.app');
    }
}
