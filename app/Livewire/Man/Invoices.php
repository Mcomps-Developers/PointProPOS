<?php

namespace App\Livewire\Man;

use Livewire\Component;

class Invoices extends Component
{
    public function render()
    {
        return view('livewire.man.invoices')->layout('layouts.base');
    }
}
