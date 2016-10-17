<?php declare(strict_types=1);

namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\Q3Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1AlternativePostalAddressType
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property Q3Text[]|null AddressLine
 * @property Q3Text|null Postcode
 */
class Q1AlternativePostalAddress extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('AddressLine', 0, BaseComplexType::UNBOUNDED);
        $this->defineChild('Postcode', 0, 1);
    }

    /**
     * @param Q3Text[] $addressLine
     */
    public function setAddressLine(array $addressLine)
    {
        $this->addChild('AddressLine', $addressLine);
    }

    /**
     * @param Q3Text $postcode
     */
    public function setPostcode(Q3Text $postcode)
    {
        $this->addChild('Postcode', $postcode);
    }
}
