<?php namespace Quodos\Countries;

interface LaravelCountriesInterface
{
    /**
     * This function is used as a quick way for
     * the user to return an array with countries
     * and their corresponding ISO codes in a
     * specific language.
     *
     * @param   string  $lang      The language for with to fetch the country list
     * @return  array   Contains the countries and their corresponding ISO codes in the chosen language
     */
    public function get($lang);
}