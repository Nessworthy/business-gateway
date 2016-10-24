<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Content\DespatchNameText;
use Isg\BusinessGateway\Parts\Content\Q4Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1AlternativeDespatchDetails
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property null|DespatchNameText AlternativeDespatchName
 * @property null|Q4Text AlternativeDespatchReference
 * @property null|Q1AlternativeDespatchAddress AlternativeDespatchAddress
 */
class Q1AlternativeDespatchDetails extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('AlternativeDespatchName', 0, 1);
        $this->defineChild('AlternativeDespatchReference', 0, 1);
        $this->defineChild('AlternativeDespatchAddress', 0, 1);
    }

    /**
     * @param DespatchNameText $alternativeDespatchName
     */
    public function setAlternativeDespatchName(DespatchNameText $alternativeDespatchName)
    {
        $this->addChild('AlternativeDespatchName', $alternativeDespatchName);
    }

    /**
     * @param Q4Text $alternativeDespatchReference
     */
    public function setAlternativeDespatchReference(Q4Text $alternativeDespatchReference)
    {
        $this->addChild('AlternativeDespatchReference', $alternativeDespatchReference);
    }

    /**
     * @param Q1AlternativeDespatchAddress $alternativeDespatchAddress
     */
    public function setAlternativeDespatchAddress(Q1AlternativeDespatchAddress $alternativeDespatchAddress)
    {
        $this->addChild('AlternativeDespatchAddress', $alternativeDespatchAddress);
    }
}
