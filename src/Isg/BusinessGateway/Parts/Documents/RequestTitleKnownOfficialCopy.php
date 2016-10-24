<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Documents;

use Isg\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Isg\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1\Q1Product;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class RequestTitleKnownOfficialCopy
 * Version 2.1
 * @package Isg\BusinessGateway\Parts\Documents
 * @property Q1Identifier ID
 * @property Q1Product Product
 */
class RequestTitleKnownOfficialCopy extends BaseComplexType
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
    ) {
        parent::__construct();
        $this->addChild('ID', $id);
        $this->addChild('Product', $product);
    }
}
