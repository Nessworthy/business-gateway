<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Documents;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1\Q1Product;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class RequestTitleKnownOfficialCopyV2_1
 * @package Nessworthy\BusinessGateway\Parts\Documents
 * @property Q1Identifier ID
 * @property Q1Product Product
 */
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