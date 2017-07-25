<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\AuditLogoutSuccess;

class LogSuccessfulLogout
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
        // error_log('LogSuccessfulLogout ' . json_encode($event));
        $successUserDetails = $event->user;

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $successUserDetails['ip_address'] = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $successUserDetails['ip_address'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $successUserDetails['ip_address'] = $_SERVER['REMOTE_ADDR'];
        }

        AuditLogoutSuccess::create([
            'user_id'        => (isset($successUserDetails['id']) ? $successUserDetails['id'] : null),
            'email'          => $successUserDetails['email'],
            'ip_address'     => $successUserDetails['ip_address']
        ]);
    }
}
