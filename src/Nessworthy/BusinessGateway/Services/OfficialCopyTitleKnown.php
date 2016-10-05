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
        return 'performTitleKnownSearch';
    }

    /**
     * @inheritDoc
     */
    public function getVersion()
    {
        return '2.1';
    }

    /**
     * @inheritDoc
     */
    public function getNamespace()
    {
        return 'http://www.oscre.org/ns/eReg-Final/2011/RequestTitleKnownOfficialCopyV2_1';
    }
}