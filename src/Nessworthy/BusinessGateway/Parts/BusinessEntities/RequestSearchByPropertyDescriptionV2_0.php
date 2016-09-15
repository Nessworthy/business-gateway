<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0\Q1Product;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class RequestSearchByPropertyDescriptionV2_0
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property Q1Identifier ID
 * @property Q1Product Product
 */
class RequestSearchByPropertyDescriptionV2_0 extends BaseComplexType
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
     * RequestSearchByPropertyDescriptionV2_0 constructor.
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