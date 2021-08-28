<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\EventVideo;

class ListenerVideo
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
     * @param  object  $event
     * @return void
     */
    public function handle(EventVideo $event)
    {
        $this->Increase($event->event);
    }



    public function Increase($event)
    {
        $event->views = $event->views + 1;
        $event->save();
    }
}
