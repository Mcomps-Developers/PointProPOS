<?php

namespace App\Livewire\Cst;

use Livewire\Component;

class Contact extends Component
{
    public $message;

    protected $rules = [
        'message' => 'required|string|max:255',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function send()
    {
        $this->validate();
        
    }
    public function render()
    {
        return view('livewire.cst.contact')->layout('layouts.app');
    }
}
