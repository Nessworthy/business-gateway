<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Content\Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1MessageDetails extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Description', 1, 1);
    }

    public function __construct(Text $description)
    {
        parent::__construct();
        $this->addChild('Description', $description);
    }
}
