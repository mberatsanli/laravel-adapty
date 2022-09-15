<?php

namespace MBS\LaravelAdapty\Data\Webhook;

class BillingIssueDetectedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }
}
