<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Content\Q3Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Communication
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property Q3Text Telephone
 */
class Q1Communication extends BaseComplexType
{
    public function __construct(Q3Text $telephone)
    {
        parent::__construct();
        $this->addChild('Telephone', $telephone);
    }

    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Telephone', 1, 1);
    }
}
