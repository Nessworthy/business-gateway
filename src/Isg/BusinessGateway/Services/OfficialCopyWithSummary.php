<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Services;

/**
 * Class OfficialCopyTitleKnown
 * Service implementation for an Official Copy With Summary request.
 * @package Isg\BusinessGateway\Services
 */
class OfficialCopyWithSummary extends BaseWebService
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
    public function getRequestName() : string
    {
        return 'performOCWithSummary';
    }

    /**
     * @inheritDoc
     */
    public function getVersion() : string
    {
        return '2.1';
    }

    /**
     * @inheritDoc
     */
    public function getNamespace() : string
    {
        return 'http://www.oscre.org/ns/eReg-Final/2011/ResponseOCWithSummaryV2_1';
    }
}
