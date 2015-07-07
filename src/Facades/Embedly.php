<?php namespace Badawy\Embedly\Facades;


use Illuminate\Support\Facades\Facade;

class Embedly extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Embedly';
    }

}