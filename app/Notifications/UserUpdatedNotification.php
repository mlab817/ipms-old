<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserUpdatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;

    public $causer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, User $causer)
    {
        $this->user = $user;
        $this->causer = $causer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'sender'    => $this->causer,
            'subject'   => 'User Updated',
            'message'   => $this->causer->name . ' updated your information.',
        ];
    }
}
