<?php

namespace App\Listeners;

use App\Events\NewDataEvent;
use App\Events\newProductEvent;
use App\Mail\NewProduct;
use Illuminate\Support\Facades\Auth;
use Mail;

class NewDataListner
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewDataEvent $event): void
    {
        Mail::to(Auth::user()->email)->send(new NewProduct($event->data));
    }
}
