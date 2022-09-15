<?php

namespace MBS\LaravelAdapty\Data\Webhook;

use MBS\LaravelAdapty\Data\Event\SubscriptionStartedEventData;

/**
 * @property-read SubscriptionStartedEventData $event_properties
 */
class SubscriptionStartedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionStartedEventData::fromArray($data);
    }

}
