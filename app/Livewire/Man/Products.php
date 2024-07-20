<?php

namespace App\Livewire\Man;

use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        return view('livewire.man.products')->layout('layouts.base');
    }
}
