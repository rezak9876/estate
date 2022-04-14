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

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // public $content_type;
    // public $file;
    // public $own_type;
    // public $send_status;
    // public $time;
    // public $content;
    public $user_id;
    protected $chat_id;
    public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($body_array, $chat_id, $user_id)
    {
        $this->chat_id =  $chat_id;
        $this->user_id =  $user_id;

        // switch ($body_array['content_type']) {
        //     case 'file':
        //         // declare file of response for file chatline
        //         $this->file  =  $body_array['file'];
        //         break;
        //     default:
        //         // declare content of response for text chatline
        //         $this->content  =  $body_array['content'];
        // }

        // $this->content_type =  $body_array['content_type'];
        // $this->own_type =  $body_array['own_type'];
        // $this->send_status =  $body_array['send_status'];
        // $this->time =  $body_array['time'];
        $this->data =  $body_array;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('my-channel.' . $this->chat_id);
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
