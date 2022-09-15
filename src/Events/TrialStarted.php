<?php

namespace MBS\LaravelAdapty\Events;

class TrialStarted extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }

}
