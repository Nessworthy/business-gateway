<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1ValidationErrors extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Code', 1, 1);
        $this->defineChild('Description', 1, 1);
    }

    public function __construct(Text $code, Text $description)
    {
        parent::__construct();
        $this->addChild('Code', $code);
        $this->addChild('Description', $description);
    }

}