<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\DespatchNameText;
use Nessworthy\BusinessGateway\Parts\Content\Q4Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

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