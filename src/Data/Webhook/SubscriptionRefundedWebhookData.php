<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class SubscriptionRefundedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }
}
