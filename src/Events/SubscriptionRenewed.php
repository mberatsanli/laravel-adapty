<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\SubscriptionRenewedEventData;

/**
 * @property-read SubscriptionRenewedEventData $event_properties
 */
class SubscriptionRenewed extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionRenewedEventData::fromArray($data);
    }

}
