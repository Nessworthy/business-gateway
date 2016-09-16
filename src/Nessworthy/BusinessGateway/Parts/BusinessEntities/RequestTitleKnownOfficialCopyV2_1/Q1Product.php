<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1;

use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1Product extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('DocumentDetails', 0, BaseComplexType::UNBOUNDED);
        $this->defineChild('ExternalReference', 1, 1);
        $this->defineChild('CustomerReference', 1, 1);
        $this->defineChild('SubjectProperty', 1, 1);
        $this->defineChild('ExpectedPrice', 0, 1);
        $this->defineChild('Contact', 1, BaseComplexType::UNBOUNDED);
        $this->defineChild('TitleKnownOfficialCopy', 1, 1);
        $this->defineChild('AlternativeDespatchDetails', 0, 1);
    }

}