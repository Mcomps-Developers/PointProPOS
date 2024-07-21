<?php

namespace App\Livewire\Man;

use App\Models\Invoice;
use Livewire\Component;

class Invoices extends Component
{
    public function render()
    {
        $invoices = Invoice::orderByDesc('created_at')->get();
        return view('livewire.man.invoices', ['invoices' => $invoices])->layout('layouts.base');
    }
}
