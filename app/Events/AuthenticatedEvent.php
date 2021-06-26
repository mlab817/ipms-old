<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Stevebauman\Location\Facades\Location;

class AuthenticatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ip;

    public $userId;

    public $location;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $ip, int $userId)
    {
        $this->ip = $ip;
        $this->location = Location::get($ip);
        $this->userId = $userId;
    }
}
