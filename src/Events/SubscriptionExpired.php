<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\SubscriptionExpiredEventData;

class SubscriptionExpired extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionExpiredEventData::fromArray($data);
    }

}
