<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $text;
    public $sender_id;
    public $reciever_id;
    public $images;
    public function __construct($reciever_id, $sender_id, $text, $images)
    {
        $this->reciever_id = $reciever_id;
        $this->sender_id = $sender_id;
        $this->text = $text;
        $this->images = $images;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return ["chat"];
    }
    public function broadcastAS()
    {
        return "message";
    }
}
