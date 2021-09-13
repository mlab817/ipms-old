<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Send the user a notification if the app detects a lock out
 */
class LockedOutNotification extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Security alert')
                    ->greeting("Hello, {$notifiable->username}")
                    ->line('We detected a failed attempt to login to your account using this email. If you think someone is trying to access your account without authorization, you may reset your password by clicking the button below:')
                    ->action('Reset Password', route('password.reset', ['token' => $this->token, 'email' => $notifiable->email]))
                    ->line('Why are we sending this? We take security seriously and we want to keep you in the loop on important actions in your account. This can happen when you sign in for the first time on a new computer, phone or browser, when you use your browser\'s incognito or private browsing mode or clear your cookies, or when somebody else is accessing your account.')
                    ->line('Thank you!');
    }
}
