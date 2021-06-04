<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExportProjectsAsJsonReadyNotification extends Notification
{
    use Queueable;

    public $downloadPath;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($downloadPath)
    {
        $this->downloadPath = $downloadPath;
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
            'sender'        => config('ipms.system_user'),
            'subject'       => 'Export Ready',
            'message'       => 'Successfully exported data as json',
            'actionUrl'     => route('projects.downloadJson', $this->downloadPath),
        ];
    }
}
