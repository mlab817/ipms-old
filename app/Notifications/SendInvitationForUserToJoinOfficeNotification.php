<?php

namespace App\Notifications;

use App\Models\Office;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendInvitationForUserToJoinOfficeNotification extends Notification
{
    use Queueable;

    public $member;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($member)
    {
        $this->member = User::find($member->member_id);
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
                    ->subject('['. config('app.name') .'] @'. $this->inviter->username .' has invited you to join the @' . $this->office->acronym)
                    ->greeting('Hi ' . $notifiable->username . '!')
                    ->line('The introduction to the notification.')
                    ->line('This invitation will expire in 7 days.')
                    ->action('Notification Action', url('/'));
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
            //
        ];
    }
}
