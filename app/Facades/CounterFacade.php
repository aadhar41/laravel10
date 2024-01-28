<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CounterFacade extends Facade
{
    /**
     * The function returns the accessor for the CounterContract interface.
     * @method static int increment(String $key, array $tags = null)
     * @return The string 'App\Contracts\CounterContract' is being returned.
     */
    public static function getFacadeAccessor()
    {
        return 'App\Contracts\CounterContract';
    }
}
