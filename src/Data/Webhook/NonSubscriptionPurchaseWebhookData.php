<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class NonSubscriptionPurchaseWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }
}
