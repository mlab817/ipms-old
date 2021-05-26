<?php

namespace App\Events;

use App\Models\AuditLog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AuditLogEvent implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $title;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $title)
    {
        $this->message  = $message;
        $this->title    = $title;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('audit-log');
    }

    public function broadcastAs()
    {
        return 'audit-log';
    }

    public function dontBroadcastToCurrentUser()
    {
        return true;
    }
}
