<?php

namespace App\Livewire\Cst;

use Livewire\Component;

class CstDashboard extends Component
{
    public function render()
    {
        return view('livewire.cst.cst-dashboard')->layout('layouts.app');
    }
}
