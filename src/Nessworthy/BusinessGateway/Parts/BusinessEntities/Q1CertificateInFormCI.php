<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\NumericType;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1CertificateInFormCI
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
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
     * @param NumericType $estatePlanPlotNumberNumeric
     */
    public function setEstatePlanPlotNumberNumeric(NumericType $estatePlanPlotNumberNumeric)
    {
        $this->addChild('EstatePlanPlotNumberNumeric', $estatePlanPlotNumberNumeric);
    }

}