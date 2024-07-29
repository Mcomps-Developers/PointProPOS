<?php

namespace App\Livewire\Cst;

use App\Notifications\adminContactMessage;
use App\Notifications\contactSuccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
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
        try {
            $user = Auth::user();
            $email = 'mcompsnetwork@gmail.com';
            $notification = new AdminContactMessage($email, $user, $this->message);
            Notification::route('mail', $email)->notify($notification);
            $user->notify(new contactSuccess($user, $this->message));
            $this->reset();
            notyf()->position('y', 'top')->success('Message sent!');
        } catch (\Exception $ex) {
            Log::error('Error: ' . $ex->getMessage() . ' in ' . $ex->getFile() . ' on line ' . $ex->getLine());
            notyf()->position('y', 'top')->error('An unexpected error occurred. Please try again later.');
            return redirect()->to(request()->header('referer'));
        }
    }
    public function render()
    {
        return view('livewire.cst.contact')->layout('layouts.app');
    }
}
