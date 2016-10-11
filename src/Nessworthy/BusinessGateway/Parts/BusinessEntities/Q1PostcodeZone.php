<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1PostcodeZone extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Postcode', 1, 1);
    }

    public function __construct(Text $postcode)
    {
        parent::__construct();
        $this->addChild('Postcode', $postcode);
    }

}