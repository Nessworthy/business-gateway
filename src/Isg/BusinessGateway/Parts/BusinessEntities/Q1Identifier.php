<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;
use Isg\BusinessGateway\Parts\Content\Q1Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Identifier
 * Used to hold the request identification information.
 *
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property Q1Text MessageID A unique reference.
 */
class Q1Identifier extends BaseComplexType
{

    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('MessageID', 1, 1);
    }

    /**
     * Q1Identifier constructor.
     * @param Q1Text $messageId
     */
    public function __construct(Q1Text $messageId)
    {
        parent::__construct();

        $this->addChild('MessageID', $messageId);
    }
}
