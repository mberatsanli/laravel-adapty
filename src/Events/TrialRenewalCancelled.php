<?php

namespace MBS\LaravelAdapty\Events;

class TrialRenewalCancelled extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }

}
