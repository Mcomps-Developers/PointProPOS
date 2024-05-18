<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AllClients extends Component
{
    public $name;
    public $phone_number;
    public $email;
    public function render()
    {
        return view('livewire.admin.all-clients')->layout('layouts.base');
    }
}
