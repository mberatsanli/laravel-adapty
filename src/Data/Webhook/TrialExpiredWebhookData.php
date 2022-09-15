<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class TrialExpiredWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }
}
