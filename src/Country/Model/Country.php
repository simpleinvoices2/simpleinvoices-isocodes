<?php
namespace SimpleInvoices\ISOCodes\Country\Model;

class Country implements CountryInterface
{
    protected $alpha2;
    protected $alpha3;
    protected $name;
    protected $numeric;
    protected $officialName;
    protected $commonName;
    
    public function exchangeArray($data)
    {
        $this->alpha2       = $data['alpha_2'];
        $this->alpha3       = $data['alpha_3'];
        $this->name         = $data['name'];
        $this->numeric      = $data['numeric'];
        $this->officialName = isset($data['official_name']) ? $data['official_name'] : null;
        $this->commonName   = isset($data['common_name'])   ? $data['common_name']   : null;
    }
    
    /**
     * Get the alpha-2 code of the country.
     *
     * @return string Two letter alphabetic code of the country
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Get the alpha-3 code of the country.
     *
     * @return string Three letter alphabetic code of the country.
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Get the name of the country.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the numeric code of the country.
     *
     * @return string Three digit numeric code of the item, including leading zeros
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     * Get the official name of the country.
     *
     * @return string|null Official name of the country
     */
    public function getOfficialname()
    {
        return $this->officialName;
    }

    /**
     * Get the common name of the country.
     *
     * @return string|null Common name of the country
     */
    public function getCommonName()
    {
        return $this->commonName;
    }
}