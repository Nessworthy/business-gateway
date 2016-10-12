<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Services;

/**
 * Class OfficialCopyWithSummaryPoll
 * Service implementation for an Official Copy With Summary poll request.
 * @package Nessworthy\BusinessGateway\Services
 */
class OfficialCopyWithSummaryPoll extends BasePollRequestWebService
{
    /**
     * @inheritDoc
     */
    protected function getServiceName() : string
    {
        return 'OfficialCopyWithSummary';
    }

    /**
     * @inheritDoc
     */
    public function getVersion() : string
    {
        return '2.1';
    }
}