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

class clientSendMessage implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user_id;
    public $message;
    public $receiver_id;


    // public function __construct(User $user, Message $message)
    public function __construct(int $user_id, int $receiver_id, string $message)
    {
        $this->user_id = $user_id;
        $this->message = $message;
        $this->receiver_id = $receiver_id;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('private-chat');
    }
    // public function broadcastOn()
    // {
    //     return ['chat']; //public channel
    // }

    public function broadcastAs()
    {
        return 'clientSendMessage';
    }
}
