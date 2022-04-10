<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $content_type;
    public $file;
    public $own_type;
    public $send_status;
    public $time;
    public $content;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($body_array)
    {
        switch ($body_array['content_type']) {
            case 'file':
                // declare file of response for file chatline
                $this->file  =  $body_array['file'];
                break;
            default:
                // declare content of response for text chatline
                $this->content  =  $body_array['content'];
        }

        $this->content_type =  $body_array['content_type'];
        $this->own_type =  $body_array['own_type'];
        $this->send_status =  $body_array['send_status'];
        $this->time =  $body_array['time'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('message-channel');
    }

    public function broadcastAs()
    {
        return 'message-event';
    }
}
