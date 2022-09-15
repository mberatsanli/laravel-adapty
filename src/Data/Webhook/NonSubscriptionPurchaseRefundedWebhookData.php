<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class NonSubscriptionPurchaseRefundedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }
}
