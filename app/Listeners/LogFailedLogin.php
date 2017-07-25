<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\AuditLoginFailed;

class LogFailedLogin
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
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle($event)
    {
        // Access the order using $event->order...
        // error_log('LogFailedLogin ' . json_encode($event));
        $failedUserDetails = $event->credentials;

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $failedUserDetails['ip_address'] = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $failedUserDetails['ip_address'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $failedUserDetails['ip_address'] = $_SERVER['REMOTE_ADDR'];
        }

        AuditLoginFailed::create([
            'user_id'        => (isset($failedUserDetails['id']) ? $failedUserDetails['id'] : null),
            'email'          => $failedUserDetails['email'],
            'ip_address'     => $failedUserDetails['ip_address']
        ]);
    }
}
