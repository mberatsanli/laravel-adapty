<?php

namespace MBS\LaravelAdapty\Events;

class TrialExpired extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }

}
