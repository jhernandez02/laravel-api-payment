<?php

namespace App\Listeners;

use App\Events\PaymentRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PaymentEmailNotification;
use Mail;

class SendEmailNotification
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
     * @param  \App\Events\PaymentRegistered  $event
     * @return void
     */
    public function handle(PaymentRegistered $event)
    {
        $mailable = new PaymentEmailNotification($event->paymentId);
        Mail::to($event->email)->send($mailable);
    }
}
