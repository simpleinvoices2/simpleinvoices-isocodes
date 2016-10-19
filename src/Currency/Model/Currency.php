<?php
namespace SimpleInvoices\ISOCodes\Currency\Model;

class Currency implements CurrencyInterface
{
    protected $alpha3;
    protected $name;
    protected $numeric;
    
    public function exchangeArray($data)
    {
        $this->alpha3       = $data['alpha_3'];
        $this->name         = $data['name'];
        $this->numeric      = $data['numeric'];
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
}