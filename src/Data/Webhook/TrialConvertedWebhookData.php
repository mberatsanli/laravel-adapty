<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class TrialConvertedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }
}
