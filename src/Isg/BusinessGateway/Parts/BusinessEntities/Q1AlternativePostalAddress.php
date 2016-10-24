<?php declare(strict_types=1);

namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Content\Q3Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1AlternativePostalAddressType
 * @package Isg\BusinessGateway\Parts\BusinessEntities
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
