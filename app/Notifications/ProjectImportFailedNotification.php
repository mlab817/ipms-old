<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectImportFailedNotification extends Notification
{
    use Queueable;

    public $id;

    public $errorMessage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(int $id, string $errorMessage)
    {
        $this->id = $id;

        $this->errorMessage = $errorMessage;
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
            'sender'    => config('ipms.system_user'),
            'subject'   => 'Project Import Failed',
            'message'   => $this->errorMessage,
            'actionUrl' => route('projects.import.index'),
        ];
    }
}
