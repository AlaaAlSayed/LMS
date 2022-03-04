<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;
use App\Models\User;

class sendMessage implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $message;
    public function __construct(int $user_id, string $message)
    {
        $this->user = $user_id;
        $this->message = $message;
    }

//     public function broadcastOn()
// {
//     return new PrivateChannel('chat'); //private channel
// }
    public function broadcastOn()
    {
        return ['chat']; //public channel
    }

    public function broadcastAs()
    {
        return 'sendMessage';
    }
}
