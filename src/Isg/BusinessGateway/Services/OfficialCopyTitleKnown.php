<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Services;

/**
 * Class OfficialCopyTitleKnown
 * Service implementation for an Official Copy Title Known request.
 * @package Isg\BusinessGateway\Services
 */
class OfficialCopyTitleKnown extends BaseWebService
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
    public function getRequestName() : string
    {
        return 'performTitleKnownSearch';
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
        return 'http://www.oscre.org/ns/eReg-Final/2011/RequestTitleKnownOfficialCopyV2_1';
    }
}