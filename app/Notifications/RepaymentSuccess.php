<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RepaymentSuccess extends Notification
{
    use Queueable;
    public $user;
    public $repayment;
    public $transaction;
    public $company;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $repayment, $transaction, $company)
    {
        $this->user = $user;
        $this->repayment = $repayment;
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
            ->level('success')
            ->subject('Payment Successful')
            ->greeting('Dear ' . $this->user->name . ',')
            ->line('Your payment of KES ' . $this->transaction->value . ' reference ' . $this->transaction->tracking_id . ' has been received on behalf of ' . $this->company->name . '. Payment for ' . date('d M Y', strtotime($this->repayment->date_due)) . ' installment updated.')
            ->line('Find more updates on your dashboard.')
            ->action('Dashboard', url('/dashboard'))
            ->line('If you have complaints, login to raise a ticket. Do not reply to this email.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Payment for ' . date('d M Y', strtotime($this->repayment->date_due)) . ' successful',
            'message' => 'Amount KES' . $this->transaction->value,
            'identity' => 'payment_successful'
        ];
    }
}
