<?php
namespace SimpleInvoices\ISOCodes\Currency\Model;

interface CurrencyInterface
{
    /**
     * Get the alpha-3 code of the currency.
     *
     * @return string Three letter alphabetic code of the currency.
     */
    public function getAlpha3();
    
    /**
     * Get the name of the currency.
     * 
     * @return string
     */
    public function getName();
    
    /**
     * Get the numeric code of the currency.
     * 
     * @return string Three digit numeric code of the currency, including leading zeros
     */
    public function getNumeric();
}