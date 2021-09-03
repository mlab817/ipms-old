<?php

namespace App\Notifications;

use App\Models\Project;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectDeletedNotification extends Notification
{
    use Queueable;

    public $project;

    public $user;

    public $reason;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $project, User $user, string $reason)
    {
        $this->project  = $project;
        $this->user     = $user;
        $this->reason   = $reason;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $id = $this->project['id'];
        $title = $this->project['title'];
        $appName = config('app.name');
        $user = $this->user->username;
        $fullName = $notifiable->full_name;
        $subject = "[$appName] @$user deleted one of your projects #$id";

        return (new MailMessage)
            ->subject($subject)
            ->greeting("Good day $fullName!")
            ->line("A project of yours entitled <strong>$title</strong> has been deleted by @$user.")
            ->line("Message: $this->reason")
            ->line('For your information');
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
            'sender'    => $this->user,
            'subject'   => 'Project Deleted',
            'message'   => $this->user->name . ' deleted your project: ' . $this->project['title'],
            'actionUrl' => '#',
        ];
    }
}
