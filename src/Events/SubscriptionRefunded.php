<?php

namespace MBS\LaravelAdapty\Events;

class SubscriptionRefunded extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionRefunded::fromArray($data);
    }

}
