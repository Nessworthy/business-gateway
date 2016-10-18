<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Services;

/**
 * Class OfficialCopyTitleKnownPoll
 * Service implementation for an Official Copy Title Known poll request.
 * @package Nessworthy\BusinessGateway\Services
 */
class OfficialCopyTitleKnownPoll extends BasePollRequestWebService
{
    /**
     * @inheritDoc
     */
    public function getServiceName() : string
    {
        return 'OfficialCopyTitleKnown';
    }

    /**
     * @inheritDoc
     */
    public function getVersion() : string
    {
        return '2.1';
    }
}