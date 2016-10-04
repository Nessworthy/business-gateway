<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Acknowledgement
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property Q1AcknowledgementDetails AcknowledgementDetails
 */
class Q1Acknowledgement extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('AcknowledgementDetails', 1, 1);
    }

    /**
     * Q1Acknowledgement constructor.
     * @param Q1AcknowledgementDetails $acknowledgementDetails
     */
    public function __construct(Q1AcknowledgementDetails $acknowledgementDetails)
    {
        parent::__construct();
        $this->addChild('AcknowledgementDetails', $acknowledgementDetails);
    }

}