<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class SubscriptionPausedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO: event data
    }
}
