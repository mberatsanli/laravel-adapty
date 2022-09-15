<?php

namespace MBS\LaravelAdapty\Events;

/**
 * @property-read SubscriptionRefunded $event_properties
 */
class SubscriptionRefunded extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionRefunded::fromArray($data);
    }

}
