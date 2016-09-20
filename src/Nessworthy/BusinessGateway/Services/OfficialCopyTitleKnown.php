<?php
namespace Nessworthy\BusinessGateway\Services;

class OfficialCopyTitleKnown extends BaseWebService
{
    /**
     * @inheritDoc
     */
    protected function getServiceName()
    {
        return 'OfficialCopyTitleKnown';
    }

    /**
     * @inheritDoc
     */
    public function getRequestName()
    {
        return 'RequestTitleKnownOfficialCopyV2_1';
    }

    /**
     * @inheritDoc
     */
    public function getVersion()
    {
        return '2.1';
    }
}