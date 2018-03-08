<?php

namespace App\Events;

use App\Book;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewBookCreated
{
    use Dispatchable, SerializesModels;

    public $pdfsStorage;
    public $savePdfAs;
    public $fileName;
    /**
     * @var Book
     */
    public $book;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($book, $pdfsStorage, $savePdfAs, $fileName)
    {
        $this->book = $book;
        $this->pdfsStorage = $pdfsStorage;
        $this->savePdfAs = $savePdfAs;
        $this->fileName = $fileName;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
