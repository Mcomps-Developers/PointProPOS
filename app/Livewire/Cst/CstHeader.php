<?php

namespace App\Livewire\Cst;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CstHeader extends Component
{
    public function render()
    {
        $user = User::findOrFail(Auth::id());
        $unreadNotifications = $user->unreadNotifications;
        return view('livewire.cst.cst-header', ['unreadNotifications' => $unreadNotifications]);
    }
}
