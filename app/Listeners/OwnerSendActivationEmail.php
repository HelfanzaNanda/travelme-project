<?php

namespace App\Listeners;

use App\Events\OwnerActivationEmail;
use App\Mail\ActivationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class OwnerSendActivationEmail
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
    public function handle(OwnerActivationEmail $event)
    {
        if ($event->owner->active == '2'){
            return;
        }

        Mail::to($event->owner->email)->send(new ActivationEmail($event->owner));
    }
}
