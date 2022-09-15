<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\SubscriptionRenewalCancelledEventData;

class SubscriptionRenewalCancelled extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionRenewalCancelledEventData::fromArray($data);
    }

}
