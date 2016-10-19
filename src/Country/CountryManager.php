<?php
namespace SimpleInvoices\ISOCodes\Country;

class CountryManager implements CountryManagerInterface
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
     * Get all countries.
     *
     * @return array Array of SimpleInvoices\ISOCodes\Country\Model\CountryInterface objects.
     */
    public function getAllCountries()
    {
        return $this->adapter->getAllCountries();
    }
    
    /**
     * Get a country by its code.
     *
     * @param string|int $code
     */
    public function getCountry($code)
    {
        return $this->adapter->getCountry($code);
    }
    
}