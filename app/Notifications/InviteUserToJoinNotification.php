<?php

namespace App\Notifications;

use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Notification;

class InviteUserToJoinNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $invitation;

    /**
     * @param Invitation $invitation
     */
    public function __construct(Invitation $invitation)
    {
        $invitation->load('office','inviter');

        $this->invitation = $invitation;
    }

    public function via($notifiable)
    {

    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('')
            ->greeting('')
            ->line('')
            ->action('');
    }
}
