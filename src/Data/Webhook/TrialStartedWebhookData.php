<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class TrialStartedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }
}
