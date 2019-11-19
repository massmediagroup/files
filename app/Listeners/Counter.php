<?php

namespace App\Listeners;

use App\Events\FileView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Counter
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
     * @param  FileView  $event
     * @return void
     */
    public function handle(FileView $event)
    {
        $event->file->increment('view_count');
    }
}
