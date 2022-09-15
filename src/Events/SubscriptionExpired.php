<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\SubscriptionExpiredEventData;

/**
 * @property-read SubscriptionExpiredEventData $event_properties
 */
class SubscriptionExpired extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionExpiredEventData::fromArray($data);
    }

}
