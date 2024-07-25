<?php

namespace App\Livewire\Man;

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

        // Progress Bar
        $totalAmountDue = $invoice->amount;
        $totalAmountPaid = $invoice->repayments()->sum('amount_paid');
        if ($totalAmountDue > 0) {
            $repaymentProgress = ($totalAmountPaid / $totalAmountDue) * 100;
        } else {
            $repaymentProgress = 0;
        }

        return view('livewire.man.invoice-details', ['invoice' => $invoice, 'schedules' => $schedules, 'products' => $products, 'repaymentProgress' => $repaymentProgress])->layout('layouts.base');
    }
}
