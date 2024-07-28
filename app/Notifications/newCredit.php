<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

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
        return ['mail', 'database', WebPushChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $numS = '';

        if ($this->frequency === 'daily') {
            $numS = 'days';
        } elseif ($this->frequency === 'weekly') {
            $numS = 'weeks';
        } elseif ($this->frequency === 'monthly') {
            $numS = 'months';
        }
        return (new MailMessage)
            ->success()
            ->priority(1)
            ->level('success')
            ->subject('Congratulations')
            ->greeting('Congratulations ' . $this->user->name . ' from ' . $this->company->name)
            ->line('Your credit has been processed with Invoice No.# INV-' . $this->invoice->reference . '-PP. Credit status is set to: ' . $this->invoice->status)

            ->line('***********************')

            ->line('Credit Summary')
            ->line('Invoice Subtotal: KES ' . $this->invoice->subtotal)
            ->line('Invoice Discount: KES ' . $this->invoice->discount)
            ->line('Invoice Tax: KES ' . $this->invoice->tax)
            ->line('Invoice Total: KES ' . $this->invoice->amount)

            ->line('***********************')

            ->line('You are set to pay the credit total amount ' . $this->frequency . ' for ' . $this->invoice->repayment_frequency . ' ' . $numS . ' installments, first installment due on ' . date('d M Y', strtotime($this->invoice->first_repayment_date)))
            ->line('***********************')
            ->line('To get more details about this credit, associated products and payment progress, login your account to get started.')
            ->action('Dashboard', url('/dashboard'))
            ->line('If this was an error, do not hesitate to contact ' . $this->company->name . ' via +' . $this->company->phone . '. If not satisfied with their response, report the issue to pointpro@mcomps.africa');
    }
    public function toWebPush(object $notifiable)
    {
        return (new WebPushMessage)
            ->title('Congratulations')
            ->body('Congratulations ' . $this->user->name . ' from ' . $this->company->name . '. Your credit has been processed with Invoice No.# INV-' . $this->invoice->reference . '-PP. Credit status is set to: ' . $this->invoice->status);
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
