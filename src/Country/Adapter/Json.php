<?php
namespace SimpleInvoices\ISOCodes\Country\Adapter;

use SimpleInvoices\ISOCodes\Country\Model\CountryInterface;
use SimpleInvoices\ISOCodes\Country\Model\Country;

class Json
{
    /**
     * Array of Model\CountryInterface objects
     *
     * @var array
     */
    protected $countries;
    
    /**
     * Object prototype.
     *
     * @var CountryInterface
     */
    protected $objectProtoype;
    
    /**
     * Constructor
     *
     * @param CountryInterface $prototype The prototype for the country.
     */
    public function __construct(CountryInterface $prototype = null)
    {
        if ($prototype instanceof CountryInterface) {
            $this->objectProtoype = $prototype;
        } else {
            $this->objectProtoype = new Country();
        }
    }
    
    /**
     * Get all countries.
     *
     * @return array Array of SimpleInvoices\ISOCodes\Country\Model\CountryInterface objects.
     */
    public function getAllCountries()
    {
        $this->loadCountries();
        return $this->countries;
    }
    
    /**
     * Get a country by its code.
     *
     * @param string|int $code
     */
    public function getCountry($code)
    {
        $this->loadCountries();
    
        if (is_numeric($code)) {
            $code = str_pad($code,3, '0', STR_PAD_LEFT);
            if (strlen($code) == 3 ) {
                foreach ($this->countries  as $country) {
                    if ($country->getNumeric() === $code) {
                        return $country;
                    }
                }
            }
    
            return null;
        }
    
        // Codes are stored in upper case, so normalize.
        $code = strtoupper($code);
    
        if (strlen($code) == 3) {
            return (isset($this->countries[$code]) ? $this->countries[$code] : null);
        } elseif (strlen($code) == 2) {
            foreach ($this->countries  as $country) {
                if ($country->getAlpha2() === $code) {
                    return $country;
                }
            }
        }
    
        return null;
    }
    
    /**
     * Load the countries list from PKG-ISOCodes JSON file.
     *
     * @return void
     */
    protected function loadCountries()
    {
        // No need to reload the countries.
        if (!empty($this->countries)) {
            return;
        }
    
        $json = file_get_contents(dirname(dirname(dirname(__DIR__))) . '/data/iso_3166-1.json');
        $data = json_decode($json, true);
    
        if (!isset($data['3166-1'])) {
            // Throw exception as PKG-ISO sets this
        }
    
        $data = $data['3166-1'];
    
        foreach($data as $countryData) {
            $country = clone $this->objectProtoype;
    
            $country->exchangeArray($countryData);
    
            // Our system makes use of alpha-3 so in order to speed up things
            // we set this code as the key in the array.
            $this->countries[$countryData['alpha_3']] = $country;
        }
    }
    
    /**
     * Set the prototype for the returned objects.
     * 
     * @param CountryInterface $prototype
     * @return AdapterInterface
     */
    public function setObjectProtoype(CountryInterface $prototype)
    {
        $this->objectProtoype = $prototype;
    }
}