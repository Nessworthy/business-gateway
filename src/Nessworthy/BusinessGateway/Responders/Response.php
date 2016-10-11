<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Responders;

interface Response
{
    /**
     * Fetch the unique message ID that this request responded to.
     * @return string
     */
    public function getMessageId() : string;
}