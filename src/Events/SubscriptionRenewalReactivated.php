<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\SubscriptionRenewalReactivatedEventData;

class SubscriptionRenewalReactivated extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionRenewalReactivatedEventData::fromArray($data);
    }

}
