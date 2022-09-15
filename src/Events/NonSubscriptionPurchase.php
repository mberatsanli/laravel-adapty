<?php

namespace MBS\LaravelAdapty\Events;

class NonSubscriptionPurchase extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }

}
