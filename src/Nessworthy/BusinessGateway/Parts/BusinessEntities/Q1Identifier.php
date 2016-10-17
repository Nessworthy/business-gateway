<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;
use Nessworthy\BusinessGateway\Parts\Content\Q1Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Identifier
 * Used to hold the request identification information.
 *
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
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
