<?php

namespace App\Livewire\Man;

use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\PaymentSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        $schedules = PaymentSchedule::orderBy(DB::raw("DATE_FORMAT(date_due, '%Y-%m-%d')"), 'asc')
            ->where('invoice_id', $invoice->id)
            ->get();

        $products = InvoiceProduct::where('invoice_id', $invoice->id)->get();
        return view('livewire.man.invoice-details', ['invoice' => $invoice, 'schedules' => $schedules, 'products' => $products])->layout('layouts.base');
    }
}
