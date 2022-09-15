<?php

namespace MBS\LaravelAdapty\Events;

class EnteredGracePeriod extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }

}
