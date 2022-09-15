<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\SubscriptionRenewedEventData;

class SubscriptionRenewed extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionRenewedEventData::fromArray($data);
    }

}
