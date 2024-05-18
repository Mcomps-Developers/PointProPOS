<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyProfile extends Component
{
    public function render()
    {
        $user = User::findOrFail(Auth::id());
        return view('livewire.user.my-profile', ['user' => $user])->layout('layouts.base');
    }
}
