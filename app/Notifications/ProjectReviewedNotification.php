<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectReviewedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $review;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($review, $user)
    {
        $this->review = $review;
        $this->user = $user;
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
            'sender'    => $this->review->user,
            'subject'   => 'Project Reviewed',
            'message'   => $this->user->name . ' reviewed your project: ' . $this->review->project->title,
            'actionUrl' => route('projects.show', $this->review->project),
        ];
    }
}
