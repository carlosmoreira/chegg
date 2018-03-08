<?php

namespace App\Listeners;

use App\Events\NewBookCreated;
use App\Chegg\ImagickHelper;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateDefaultImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewBookCreated  $event
     * @return void
     */
    public function handle(NewBookCreated $event)
    {
        $pdfsStorage = $event->pdfsStorage;
        $savePdfAs = $event->savePdfAs;
        $fileName = $event->fileName;
        $book = $event->book;
        $imageSaved = ImagickHelper::ConvertNSave($pdfsStorage,$savePdfAs,$fileName);
        if($imageSaved){
            $book->image = $imageSaved;
            $book->save();
        }
    }
}
