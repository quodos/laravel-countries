<?php namespace Quodos\Countries;

use Quodos\Countries\Exception\CountryListNotFoundException;
use RuntimeException;

class Countries implements Contracts\CountriesInterface
{
    /**
     * The URL of the country list package (default package is umpirsky/country-list)
     *
     * @var   string
     */
    protected $package_url  = 'vendor/umpirsky/country-list/country/cldr';

    /**
     * The name of the country list file
     *
     * @var   string
     */
    protected $file_name    = 'country.php';

    /**
     * Variable holding the country list
     *
     * @var   array
     */
    protected $country_list = array();

    /**
     * This function is used as a quick way for
     * the user to return an array with countries
     * and their corresponding ISO codes in a
     * specific language.
     *
     * @param   string  $lang      The language for with to fetch the country list
     * @return  array   Contains the countries and their corresponding ISO codes in the chosen language
     */
    public function get($lang = "en")
    {
        if ( ! sizeof($this->country_list))
        {
            $list_url = __DIR__ . '/' . $this->package_url . '/' . $lang . '/' . $this->file_name;

            if (!file_exists($list_url))
            {
                throw new CountryListNotFoundException('Could not find country list.');
            }

            if (!$this->country_list = @include_once($list_url))
            {
                throw new CountryListNotFoundException('Could not include country list.');
            }
        }

        return $this->country_list;
    }
}