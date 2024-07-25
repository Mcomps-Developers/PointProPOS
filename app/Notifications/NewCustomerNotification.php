<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCustomerNotification extends Notification
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
            ->line('We are delighted to welcome you to ' . env('APP_NAME'))
            ->line(env('APP_NAME') . ' is a Point Of Sale (POS) system designed to do an extra work of credit management besides the obvious POS & Inventory management. Your account was created to help enable you access installment purchases.')
            ->line('For assurance, below are the details of our client that registered you to this service. We sent you this email to consent you.')
            ->line('***********************')
            ->line('Business Details:')
            ->line('Business Name: ' . $this->company->name)
            ->line('Business Email: ' . $this->company->email)
            ->line('Business Phone: ' . $this->company->phone)
            ->line('Business Address: ' . $this->company->address)
            ->line('***********************')
            ->line('Your Credentials')
            ->line('Login Email: ' . $this->user->email)
            ->line('Password: ' . $this->userPassword)
            ->line('Contact Phone: +' . $this->user->phone_number)
            ->line('Access your dashboard to consent for this service.')
            ->line('Note: You can use login with google to connect your G-Mail with PointPro for direct login without password.')
            ->action('Login', url('/dashboard'))
            ->line('Great experience awaits you!');
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
            'message' => 'Customer account was created successfully'
        ];
    }
}
