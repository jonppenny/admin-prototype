<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class LogRegisteredUser
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
     * Log the user login event to the error log.
     *
     * @param $event
     *
     * @return void
     */
    public function handle($event) : void
    {
        // Access the order using $event->order...
        error_log('LogRegisteredUser ' . json_encode($event));
    }
}
