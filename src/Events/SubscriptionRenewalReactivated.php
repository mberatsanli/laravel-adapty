<?php

namespace MBS\LaravelAdapty\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubscriptionRenewalReactivated
{
    use Dispatchable, SerializesModels;

    /**
     * @return void
     */
    public function __construct(public $event)
    {
        //
    }

}
