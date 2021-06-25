<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AuthenticatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ip;

    public $userId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $ip, int $userId)
    {
        $this->ip = $ip;
        $this->userId = $userId;
    }
}
