<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Builders;

use Isg\BusinessGateway\Parts\BusinessEntities\PollRequest\Q1Identifier;
use Isg\BusinessGateway\Parts\Content\MessageIDText;
use Isg\BusinessGateway\Parts\Documents\PollRequest;
use Isg\BusinessGateway\System\Builder;

/**
 * Class Poll
 * Builds a poll request to fetch data from a previous request.
 * @package Isg\BusinessGateway\Builders
 */
class Poll implements Builder
{
    private $messageId;

    /**
     * Set the unique message ID of a previous request to poll for.
     * @param string $messageId
     */
    public function setMessageId(string $messageId)
    {
        $messageId = new MessageIDText($messageId);
        $this->messageId = $messageId;
    }

    /**
     * Build the poll request as a set of nested objects.
     * @return PollRequest
     */
    public function buildRequest()
    {
        $messageId = new Q1Identifier($this->messageId);
        $request = new PollRequest($messageId);

        return $request;
    }

}