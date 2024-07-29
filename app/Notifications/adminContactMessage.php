<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class adminContactMessage extends Notification
{
    use Queueable;
    public $email;
    public $user;
    public $message;
    /**
     * Create a new notification instance.
     */
    public function __construct($email, $user, $message)
    {
        $this->email = $email;
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Message')
            ->level('info')
            ->from($this->user->email)
            ->greeting('Dear Admin,')
            ->line('You have a new message that needs your attention.')
            ->line('*********************')
            ->line('User: ' . $this->user->name)
            ->line('Tel: +' . $this->user->phone_number)
            ->line('Email: ' . $this->user->email)
            ->line('*********Message********')
            ->line($this->message)
            ->line('*********************')
            ->line('Taking any action on this message is your sole responsibility and you are fully accountable. Good luck!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
