<?php

namespace App\Livewire\Man;

use Livewire\Component;

class AddProduct extends Component
{
    public function render()
    {
        return view('livewire.man.add-product')->layout('layouts.base');
    }
}
