<?php
namespace SimpleInvoices\ISOCodes\Currency\Adapter;

use SimpleInvoices\ISOCodes\Currency\Model\CurrencyInterface;
use SimpleInvoices\ISOCodes\Currency\Model\Currency;

class Json
{
    /**
     * Array of Model\CurrencyInterface objects
     *
     * @var array
     */
    protected $currencies = [];
    
    /**
     * Object prototype.
     *
     * @var CurrencyInterface
     */
    protected $objectProtoype;
    
    /**
     * Constructor
     *
     * @param CurrencyInterface $prototype The prototype for the country.
     */
    public function __construct(CurrencyInterface $prototype = null)
    {
        if ($prototype instanceof Currency) {
            $this->objectProtoype = $prototype;
        } else {
            $this->objectProtoype = new Currency();
        }
    }
    
    /**
     * Get all currencies.
     *
     * @return array
     */
    public function getAllCurrencies()
    {
        $this->loadCurrencies();
        
        return $this->currencies;
    }

    /**
     * Get a currency given its code.
     *
     * @param string|int $code The currency code
     */
    public function getCurrency($code)
    {
        $this->loadCurrencies();
        
        if (is_numeric($code)) {
            $code = str_pad($code,3, '0', STR_PAD_LEFT);
            if (strlen($code) == 3 ) {
                foreach ($this->currencies  as $currency) {
                    if ($currency->getNumeric() === $code) {
                        return $currency;
                    }
                }
            }
        
            return null;
        }
        
        // Codes are stored in upper case, so normalize.
        $code = strtoupper($code);
        
        if (strlen($code) == 3) {
            return (isset($this->currencies[$code]) ? $this->currencies[$code] : null);
        }
        
        return null;
    }
    
    /**
     * Load the currencies list from PKG-ISOCodes JSON file.
     *
     * @return void
     */
    protected function loadCurrencies()
    {
        // No need to reload the currencies
        if (!empty($this->currencies)) {
            return;
        }
    
        $json = file_get_contents(dirname(dirname(dirname(__DIR__))) . '/data/iso_4217.json');
        $data = json_decode($json, true);
    
        if (!isset($data['4217'])) {
            // Throw exception as PKG-ISO sets this
        }
    
        $data = $data['4217'];
    
        foreach($data as $currencyData) {
            $currency = clone $this->objectProtoype;
    
            $currency->exchangeArray($currencyData);
    
            // Our system makes use of alpha-3 so in order to speed up things
            // we set this code as the key in the array.
            $this->currencies[$currencyData['alpha_3']] = $currency;
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