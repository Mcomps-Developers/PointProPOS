<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class newCredit extends Notification
{
    use Queueable;
    public $user;
    public $invoice;
    public $company;
    public $frequency;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $invoice, $company, $frequency)
    {
        $this->user = $user;
        $this->invoice = $invoice;
        $this->company = $company;
        $this->frequency = $frequency;
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
            ->success()
            ->priority(1)
            ->level('success')
            ->subject('Congratulations')
            ->greeting('Congratulations ' . $this->user->name . ',')
            ->line('Your credit has been processed.')
            ->action('Dashboard', url('/dashboard'))
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
            'title' => 'Congratulations ',
            'message' => 'Credit has been processed successfully',
            'identity' => 'credit_success'
        ];
    }
}
