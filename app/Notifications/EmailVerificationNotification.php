<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class EmailVerificationNotification extends Notification
{
    private $pendingUser;

    public function __construct($pendingUser)
    {
        $this->pendingUser = $pendingUser;
    }

    // Define the delivery channels for the notification
    public function via($notifiable)
    {
        return ['mail'];  // Only send via email
    }

    public function toMail($notifiable)
    {
        // Construct the verification URL
        $verificationUrl = route('verify.email', [
            'id' => $this->pendingUser->id,
            'token' => $this->pendingUser->remember_token,
        ]);

        return (new MailMessage)
            ->subject('')
            ->line('')
            ->action('', $verificationUrl)
            ->line('Thank you for registering with us!');
    }
}
