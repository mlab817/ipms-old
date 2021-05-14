<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserDeletedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $reason;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $reason)
    {
        $this->reason = $reason;
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
                    ->subject('IPMS Account Deleted')
                    ->greeting('Good day!')
                    ->line('Please be informed that your ' . config('app.name') . ' account has been deleted. Reason for deletion is ' . $this->reason . '.')
                    ->line('If you think this is a mistake, please contact us as ' . config('ipms.email') . ' and/or ' . config('ipms.contact_info') . '.')
                    ->line('Thank you for using our application!');
    }
}
