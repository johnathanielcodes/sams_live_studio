<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PayEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $name;
    public $email;
    public $amount;
    /**
     * Create a new event instance.
     */
    public function __construct($name, $email, $amount)
    {
        $this->name = $name;
        $this->email = $email;
        $this->amount = $amount;
    }

 
    public function broadcastOn()
    {

        new Channel('initiate-payment');
    }
    public function broadcastAs()
    {
        return 'payment.initiated';
    }
}
