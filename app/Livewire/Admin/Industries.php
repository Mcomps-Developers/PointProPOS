<?php

namespace App\Livewire\Admin;

use App\Models\Industry;
use Livewire\Component;

class Industries extends Component
{
    public function render()
    {
        $items = Industry::orderBy('industry')->get();
        return view('livewire.admin.industries', ['items' => $items])->layout('layouts.base');
    }
}
