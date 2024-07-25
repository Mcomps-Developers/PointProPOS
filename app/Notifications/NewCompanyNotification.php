<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCompanyNotification extends Notification
{
    use Queueable;
    public $user;
    public $company;
    public $userPassword;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $company, $userPassword)
    {
        $this->user = $user;
        $this->company = $company;
        $this->userPassword = $userPassword;
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
            ->subject('Welcome')
            ->greeting('Dear ' . $this->user->name . ',')
            ->line('Thank you for choosing ' . env('APP_NAME') . ' as your Pont of Sale (POS) solution. It is great to see you make the best strategic move to revolutionize and effectively manage your sales in real time Like A Pro. Big Up!')
            ->line('Your business has been successfully created and credentials created. Below, find the information needed to get started.')
            ->line('Business Details:')
            ->line('Business Name: ' . $this->company->name)
            ->line('Business Email: ' . $this->company->email)
            ->line('Business Phone: ' . $this->company->phone)
            ->line('Monthly renewal fee: Ksh ' . $this->company->renewal_fee)
            ->line('Renewal Date: ' . date('d M Y', strtotime($this->company->renewal_date)))
            ->line('Business Address: ' . $this->company->address)
            ->line('Your Credentials')
            ->line('Login Email: ' . $this->user->email)
            ->line('Password: ' . $this->userPassword)
            ->line('Contact Phone: +' . $this->user->phone_number)
            ->line('To access your dashboard and finish setting up your business, click the link below.')
            ->line('Note: You can use login with google to connect your G-Mail with PointPro for direct login without password.')
            ->action('Dashboard', url('/dashboard'))
            ->line('Thank you for choosing ' . env('APP_NAME'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Welcome to ' . env('APP_NAME'),
            'message' => 'Thank you for choosing ' . env('APP_NAME') . '. Business created successfully.'
        ];
    }
}
