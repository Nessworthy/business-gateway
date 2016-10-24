<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Documents;

use Isg\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Isg\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0\Q1Product;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class RequestOCWithSummary
 * Version 2.0
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property Q1Identifier ID
 * @property Q1Product Product
 */
class RequestOCWithSummary extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('ID', 1, 1);
        $this->defineChild('Product', 1, 1);
    }

    /**
     * RequestOCWithSummaryV2_0 constructor.
     * @param Q1Identifier $id
     * @param Q1Product $product
     */
    public function __construct(
        Q1Identifier $id,
        Q1Product $product
    ) {
        parent::__construct();
        $this->addChild('ID', $id);
        $this->addChild('Product', $product);
    }
}
