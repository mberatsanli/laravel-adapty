<?php

namespace MBS\LaravelAdapty\Events;

class SubscriptionPaused extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }

}
