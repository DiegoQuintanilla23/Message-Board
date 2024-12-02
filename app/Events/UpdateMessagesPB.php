<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateMessagesPB
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $iduser;

    /**
     * Create a new event instance.
     */
    public function __construct($iduser)
    {
        $this->iduser=$iduser;
    }

    public function broadcastWith(){
        return[
            'iduser' => $this->iduser,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('UpdateMessagesPB');
    }
}
