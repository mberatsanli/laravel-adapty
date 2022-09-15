<?php

namespace MBS\LaravelAdapty\Events;

class BillingIssueDetected extends AbstractEvent
{

    public function getEventPropertiesAttribute($data)
    {
        return $data; // TODO
    }

}
