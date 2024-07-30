<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class completePayment extends Notification
{
    use Queueable;
    public $user;
    public $company;
    public $invoice;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $company, $invoice)
    {
        $this->user = $user;
        $this->company = $company;
        $this->invoice = $invoice;
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
            ->priority(1)
            ->success()
            ->subject('Congratulations! Cleared!')
            ->greeting('Dear ' . $this->user->name . ',')
            ->line('Congratulations for completing the installment payments of invoice INV-' . $this->invoice->reference . '-PP. Our client [' . $this->company->name . '] is proud of you and they will communicate to you the way forward.')
            ->line('Check dashboard for more exciting features.')
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
            'title' => 'Repayment Complete!',
            'message' => 'You have cleared the balance on INV-' . $this->invoice->reference . '-PP. Congratulations.'
        ];
    }
}
