<?php

namespace Nessworthy\BusinessGateway\Requests;

/**
 * Stub Service WSDL File for SearchByPropertyDescription
 */
class SearchByPropertyDescription extends \SoapClient
{
    const VERSION = '2.0';



    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct($wsdl = null, array $options = array())
    {
        parent::__construct($wsdl, $options);
    }

    /**
     * @param UNKNOWN $body
     * @return UNKNOWN
     */
    public function SearchByPropertyDescription($body)
    {
        return $this->__soapCall('SearchByPropertyDescription', array($body));
    }

}
