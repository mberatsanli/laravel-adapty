<?php

namespace MBS\LaravelAdapty\Events;

use MBS\LaravelAdapty\Data\Event\AccessLevelUpdatedEventData;

class AccessLevelUpdated extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return AccessLevelUpdatedEventData::fromArray($data);
    }

}
