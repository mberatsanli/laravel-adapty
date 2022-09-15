<?php

namespace MBS\LaravelAdapty\Data\Webhook;

use MBS\LaravelAdapty\Data\Event\SubscriptionRenewalCancelledEventData;

/**
 *
 */
class SubscriptionRenewalCancelledWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return SubscriptionRenewalCancelledEventData::fromArray($data);
    }
}
