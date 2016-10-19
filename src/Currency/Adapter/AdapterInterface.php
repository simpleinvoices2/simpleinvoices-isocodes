<?php
namespace SimpleInvoices\ISOCodes\Currency\Adapter;

interface AdapterInterface
{
    /**
     * Get all currencies.
     * 
     * @return array 
     */
    public function getAllCurrencies();
    
    /**
     * Get a currency given its code.
     * 
     * @param string|int $code The currency code
     */
    public function getCurrency($code);
}