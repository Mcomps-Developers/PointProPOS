<?php

namespace App\Livewire\Elements;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $user = User::findOrFail(Auth::id());

        $unreadNotifications = $user->unreadNotifications;
        $allNotfctns = $user->notifications;
        return view('livewire.elements.header', ['unreadNotifications' => $unreadNotifications, 'allNotfctns' => $allNotfctns]);
    }
    public function markNotificationAsRead($notificationId)
    {
        auth()->user()->notifications()->where('id', $notificationId)->update(['read_at' => now()]);
    }
    public function markAllNotificationsAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }
}
