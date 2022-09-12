<?php

namespace MBS\LaravelAdapty\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MBS\LaravelAdapty\LaravelAdapty
 */
class LaravelAdapty extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MBS\LaravelAdapty\LaravelAdapty::class;
    }
}
