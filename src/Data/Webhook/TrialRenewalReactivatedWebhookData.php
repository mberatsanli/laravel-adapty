<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class TrialRenewalReactivatedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }
}
