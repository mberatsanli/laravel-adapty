<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\SubscriptionRenewalReactivatedEventData;

/**
 * @property-read SubscriptionRenewalReactivatedEventData $event_properties
 */
class SubscriptionRenewalReactivated extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionRenewalReactivatedEventData::fromArray($data);
    }

}
