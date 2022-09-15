<?php

namespace MBS\LaravelAdapty\Data\Webhook;

use MBS\LaravelAdapty\Data\Event\SubscriptionStartedEventData;

class SubscriptionRenewedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionStartedEventData::fromArray($data);
    }
}
