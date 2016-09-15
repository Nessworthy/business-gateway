<?php

namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1AlternativeDespatchAddress
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 */
class Q1AlternativeDespatchAddress extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('PostalAddress', 0, 1);
        $this->defineChild('DXDetails', 0, 1);
    }

    /**
     * @param Q1AlternativePostalAddress $postalAddress
     */
    public function setPostalAddress(Q1AlternativePostalAddress $postalAddress)
    {
        $this->addChild('PostalAddress', $postalAddress);
    }

    /**
     * @param Q1DXDetails $dxDetails
     */
    public function setDXDetails(Q1DXDetails $dxDetails)
    {
        $this->addChild('DXDetails', $dxDetails);
    }

}