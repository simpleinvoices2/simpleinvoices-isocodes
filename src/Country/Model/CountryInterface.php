<?php
namespace SimpleInvoices\ISOCodes\Country\Model;

interface CountryInterface
{
    /**
     * Get the alpha-2 code of the country.
     * 
     * @return string Two letter alphabetic code of the country
     */
    public function getAlpha2();
    
    /**
     * Get the alpha-3 code of the country.
     *
     * @return string Three letter alphabetic code of the country.
     */
    public function getAlpha3();
    
    /**
     * Get the name of the country.
     * 
     * @return string
     */
    public function getName();
    
    /**
     * Get the numeric code of the country.
     * 
     * @return string Three digit numeric code of the item, including leading zeros
     */
    public function getNumeric();
    
    /**
     * Get the official name of the country.
     * 
     * @return string|null Official name of the country
     */
    public function getOfficialname();
    
    /**
     * Get the common name of the country.
     * 
     * @return string|null Common name of the country
     */
    public function getCommonName();
}