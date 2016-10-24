<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Content\NumericType;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1CertificateInFormCI
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property NumericType[] EstatePlanPlotNumeric
 */
class Q1CertificateInFormCI extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('EstatePlanPlotNumberNumeric', 1, BaseComplexType::UNBOUNDED);
    }

    /**
     * @param NumericType[] $estatePlanPlotNumberNumeric
     */
    public function __construct($estatePlanPlotNumberNumeric)
    {
        parent::__construct();
        $this->addChild('EstatePlanPlotNumberNumeric', $estatePlanPlotNumberNumeric);
    }
}
