<?php

namespace MBS\LaravelAdapty\Data\Webhook;

use MBS\LaravelAdapty\Traits\HasAttributes;

/**
 * @property-read string $profile_id
 * @property-read string|null $customer_user_id
 * @property-read string $event_type
 * @property-read string $event_datetime
 * @property-read mixed $event_properties
 * @property-read int $event_api_version
 */
abstract class AbstractWebhookData
{

    use HasAttributes;

    abstract public function getEventPropertiesAttribute($data);

}
