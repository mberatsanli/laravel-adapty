<?php

namespace MBS\LaravelAdapty\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use MBS\LaravelAdapty\Traits\HasAttributes;

/**
 * @property-read string $profile_id
 * @property-read string|null $customer_user_id
 * @property-read string $event_type
 * @property-read string $event_datetime
 * @property-read mixed $event_properties
 * @property-read int $event_api_version
 */
abstract class AbstractEvent
{

    use Dispatchable, SerializesModels, HasAttributes;

    abstract public function getEventPropertiesAttribute($data);

}
