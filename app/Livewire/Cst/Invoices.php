<?php

namespace App\Livewire\Cst;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Invoices extends Component
{
    use WithPagination;
    public function render()
    {
        $invoices = Invoice::where('user_id', Auth::id())->paginate(6);
        return view('livewire.cst.invoices', ['invoices' => $invoices])->layout('layouts.app');
    }
}
