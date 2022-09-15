<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\SubscriptionStartedEventData;

/**
 * @property-read SubscriptionStartedEventData $event_properties
 */
class SubscriptionStarted extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionStartedEventData::fromArray($data);
    }

}
