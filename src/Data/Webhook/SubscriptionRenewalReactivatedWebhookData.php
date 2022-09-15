<?php

namespace MBS\LaravelAdapty\Data\Webhook;

use MBS\LaravelAdapty\Data\Event\SubscriptionRenewalReactivatedEventData;

class SubscriptionRenewalReactivatedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionRenewalReactivatedEventData::fromArray($data);
    }
}
