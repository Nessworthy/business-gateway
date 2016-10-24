<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities\PollRequest;

use Isg\BusinessGateway\Parts\Content\MessageIDText;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Identifier
 * @package Isg\BusinessGateway\Parts\BusinessEntities\PollRequest
 * @property MessageIDText MessageID
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

    public function __construct(MessageIDText $messageId)
    {
        parent::__construct();
        $this->addChild('MessageID', $messageId);
    }
}
