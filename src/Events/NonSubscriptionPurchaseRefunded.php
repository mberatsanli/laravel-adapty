<?php

namespace MBS\LaravelAdapty\Events;

class NonSubscriptionPurchaseRefunded extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }

}
