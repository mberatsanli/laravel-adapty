<?php

namespace MBS\LaravelAdapty\Data\Webhook;

use MBS\LaravelAdapty\Data\Event\SubscriptionExpiredEventData;

class SubscriptionExpiredWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionExpiredEventData::fromArray($data);
    }
}
