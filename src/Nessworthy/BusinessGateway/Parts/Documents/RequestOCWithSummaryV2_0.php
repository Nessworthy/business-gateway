<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Documents;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0\Q1Product;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class RequestOCWithSummaryV2_0
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property Q1Identifier ID
 * @property Q1Product Product
 */
class RequestOCWithSummaryV2_0 extends BaseComplexType
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
    )
    {
        parent::__construct();
        $this->addChild('ID', $id);
        $this->addChild('Product', $product);
    }
}