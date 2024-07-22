<?php

namespace App\Livewire\Man;

use App\Models\Invoice;
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
        return view('livewire.man.invoice-details', ['invoice' => $invoice])->layout('layouts.base');
    }
}
