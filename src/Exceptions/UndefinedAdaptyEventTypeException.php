<?php

namespace MBS\LaravelAdapty\Exceptions;

class UndefinedAdaptyEventTypeException extends \UnexpectedValueException
{

    public function __construct(string $eventType)
    {
        parent::__construct("Undefined adapty event type received: $eventType");
    }

}
