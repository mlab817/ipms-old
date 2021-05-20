<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;

    public $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, string $password)
    {
        $this->user     = $user;
        $this->password = $password;
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
        $manualUrl = config('ipms.ipms_manual_url');

        return (new MailMessage)
                    ->subject('Welcome to IPMS v2')
                    ->line('The IPMS Admin has added you as a user to the System. Click the link below to start using the System.')
                    ->line('You may use your email <strong>' . $this->user->email . '</strong> to login with password: <strong>'. $this->password . '</strong>. Please change your password ASAP to avoid security issue.')
                    ->action('Login', route('login'))
                    ->when($manualUrl, function (MailMessage $mail) use ($manualUrl) {
                        return $mail->line("You may view the user manual <a href=\"" .$manualUrl ."\" target=\"_blank\">here</a>");
                    })
                    ->line('Thank you for using our application!');
    }
}
