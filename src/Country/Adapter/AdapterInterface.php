<?php
namespace SimpleInvoices\ISOCodes\Country\Adapter;

interface AdapterInterface
{
    /**
     * Get all countries.
     *
     * @return array Array of SimpleInvoices\ISOCodes\Country\Model\CountryInterface objects.
     */
    public function getAllCountries();
    
    /**
     * Get a country by its code.
     *
     * @param string|int $code
     */
    public function getCountry($code);
}