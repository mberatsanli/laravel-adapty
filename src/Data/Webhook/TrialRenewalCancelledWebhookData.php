<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class TrialRenewalCancelledWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }
}
