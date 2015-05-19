<?php namespace Quodos\Countries;

use Illuminate\Support\Facades\Facade;

class LaravelCountries extends Facade {
    /**
     * Get the facade accessor.
     *
     * @return      string      Facade accessor
     */
    protected static function getFacadeAccessor() { return 'countries'; }
}