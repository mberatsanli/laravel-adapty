<?php

namespace MBS\LaravelAdapty\Events;

class TrialConverted extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }

}
