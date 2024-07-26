<?php

namespace App\Livewire\Cst;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CstNotifications extends Component
{
    public function render()
    {
        $user = User::findOrFail(Auth::id());

        $unreadNotifications = $user->unreadNotifications;
        $allNotifications = $user->notifications;
        return view('livewire.cst.cst-notifications', ['allNotifications'=>$allNotifications,'unreadNotifications' => $unreadNotifications])->layout('layouts.app');
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
