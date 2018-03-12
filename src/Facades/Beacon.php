<?php

namespace DynEd\Beacon\Facades;

use Illuminate\Support\Facades\Facade;

class Beacon extends Facade
{
    /**
     * Get a schema builder instance for the default connection.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'DynEd\Beacon\Beacon';
    }
}