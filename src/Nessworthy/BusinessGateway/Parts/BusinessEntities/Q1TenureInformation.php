<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\TenureCode;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1TenureInformation extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('TenureTypeCode', 1, 1);
    }

    public function __construct(TenureCode $tenureTypeCode)
    {
        parent::__construct();
        $this->addChild('TenureTypeCode', $tenureTypeCode);
    }
}
