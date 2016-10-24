<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Acknowledgement
 * @package Isg\BusinessGateway\Parts\BusinessEntities
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
