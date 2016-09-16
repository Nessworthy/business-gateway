<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1\Q1Product;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class RequestTitleKnownOfficialCopyV2_1 extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('ID', 1, 1);
        $this->defineChild('Product', 1, 1);
    }

    public function __construct(
        Q1Identifier $id,
        Q1Product $product
    )
    {
        parent::__construct();
        $this->addChild('ID', $id);
        $this->addChild('Product', $product);
    }

}