<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities\PollRequest;

use Nessworthy\BusinessGateway\Parts\Content\MessageIDText;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Identifier
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities\PollRequest
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