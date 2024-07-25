<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RepaymentFailed extends Notification
{
    use Queueable;
    public $user;
    public $transaction;
    public $company;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $transaction, $company)
    {
        $this->user = $user;
        $this->transaction = $transaction;
        $this->company = $company;
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
            ->level('error')
            ->subject('Payment Failed')
            ->greeting('Dear ' . $this->user->name . ',')
            ->line('Your payment of KES ' . $this->transaction->value . ' to ' . $this->company->name . ' failed because ' . $this->transaction->failed_reason)
            ->line('If you believe this is an error, login your dashboard and contact ' . $this->company->name . ' via +' . $this->company->phone . ' for further assistance.')
            ->action('Dashboard', url('/'))
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
            'title' => 'Payment for ' . $this->transaction->value . ' failed',
            'message' => $this->transaction->failed_reason,
            'identity' => 'payment_failed'
        ];
    }
}
