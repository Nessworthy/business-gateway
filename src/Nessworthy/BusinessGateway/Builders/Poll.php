<?php
namespace Nessworthy\BusinessGateway\Builders;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\PollRequest\Q1Identifier;
use Nessworthy\BusinessGateway\Parts\Content\MessageIDText;
use Nessworthy\BusinessGateway\Parts\Documents\PollRequest;
use Nessworthy\BusinessGateway\System\Builder;

class Poll implements Builder
{
    private $messageId;

    public function setMessageId($messageId)
    {
        $messageId = new MessageIDText($messageId);
        $this->messageId = $messageId;
    }

    public function buildRequest()
    {
        $messageId = new Q1Identifier($this->messageId);
        $request = new PollRequest($messageId);

        return $request;
    }

}