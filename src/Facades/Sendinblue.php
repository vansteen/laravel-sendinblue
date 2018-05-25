<?php

namespace Vansteen\Sendinblue\Facades;

use Illuminate\Support\Facades\Facade;

class Sendinblue extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sendinblue';
    }
}
