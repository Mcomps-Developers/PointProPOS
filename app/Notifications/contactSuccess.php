<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class contactSuccess extends Notification
{
    use Queueable;
    public $user;
    public $message;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $message)
    {
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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Contact Message')
            ->greeting('Dear ' . $this->user->name . ',')
            ->line('Thank you for contact us. We have received your message and we will act on it as fast as we can.')
            ->line('***************')
            ->line('Message')
            ->line($this->message)
            ->action('Login App', url('/dashboard'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Message Sent Successfully',
            'message' => $this->message
        ];
    }
}
