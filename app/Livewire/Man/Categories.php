<?php

namespace App\Livewire\Man;

use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        return view('livewire.man.categories')->layout('layouts.base');
    }
}
