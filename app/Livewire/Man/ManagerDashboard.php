<?php

namespace App\Livewire\Man;

use Livewire\Component;

class ManagerDashboard extends Component
{
    public function render()
    {
        return view('livewire.man.manager-dashboard')->layout('layouts.base');
    }
}
