<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Content\Q3Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Contact
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property Q3Text Name
 * @property Q1Communication Communication
 */
class Q1Contact extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Name', 1, 1);
        $this->defineChild('Communication', 1, 1);
    }

    /**
     * Q1Contact constructor.
     * @param Q3Text $name
     * @param Q1Communication $communication
     */
    public function __construct(Q3Text $name, Q1Communication $communication)
    {
        parent::__construct();
        $this->addChild('Name', $name);
        $this->addChild('Communication', $communication);
    }
}
