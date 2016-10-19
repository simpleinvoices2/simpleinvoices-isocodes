<?php
namespace SimpleInvoices\ISOCodes\Currency;

class CurrencyManager implements CurrencyManagerInterface
{
    /**
     *
     * @var Adapter\AdapterInterface
     */
    protected $adapter;
    
    public function __construct(Adapter\AdapterInterface $adapter = null)
    {
        if (!$adapter instanceof Adapter\AdapterInterface) {
            // defaults to Adapter\Json
            $adapter = new Adapter\Json();
        }
    
        $this->adapter = $adapter;
    }
    
    /**
     * Get all currencies.
     *
     * @return array
     */
    public function getAllCurrencies()
    {
        return $this->adapter->getAllCurrencies();
    }
    
    /**
     * Get a currency given its code.
     *
     * @param string|int $code The currency code
     */
    public function getCurrency($code)
    {
        return $this->adapter->getCurrency($code);
    }
}