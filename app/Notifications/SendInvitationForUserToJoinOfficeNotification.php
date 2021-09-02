<?php

namespace App\Notifications;

use App\Models\Member;
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
    public function __construct($memberId)
    {
        $this->member = Member::with('inviter','office','user')->find($memberId);
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
        $member = $this->member;

        return (new MailMessage)
                    ->subject('['. config('app.name') .'] @'. $member->inviter->username .' has invited you to join the @' . $member->office->acronym)
                    ->greeting('Hi ' . $notifiable->username . '!')
                    ->line('The introduction to the notification.')
                    ->line('This invitation will expire in 7 days.')
                    ->action('Join', route('offices.members.invitation', $member->office));
    }
}
