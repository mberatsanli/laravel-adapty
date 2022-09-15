<?php

namespace MBS\LaravelAdapty\Data\Webhook;

use MBS\LaravelAdapty\Data\Event\AccessLevelUpdatedEventData;

class AccessLevelUpdatedWebhookData extends AbstractWebhookData
{

    public function getEventPropertiesAttribute($data)
    {
        return AccessLevelUpdatedEventData::fromArray($data);
    }
}
