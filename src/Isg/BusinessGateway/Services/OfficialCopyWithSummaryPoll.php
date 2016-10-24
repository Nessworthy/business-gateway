<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Services;

/**
 * Class OfficialCopyWithSummaryPoll
 * Service implementation for an Official Copy With Summary poll request.
 * @package Isg\BusinessGateway\Services
 */
class OfficialCopyWithSummaryPoll extends BasePollRequestWebService
{
    /**
     * @inheritDoc
     */
    public function getServiceName() : string
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
