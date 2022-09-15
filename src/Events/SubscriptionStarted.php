<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\SubscriptionStartedEventData;

class SubscriptionStarted extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionStartedEventData::fromArray($data);
    }

}
