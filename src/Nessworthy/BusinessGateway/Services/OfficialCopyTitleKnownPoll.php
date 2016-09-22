<?php
namespace Nessworthy\BusinessGateway\Services;

class OfficialCopyTitleKnownPoll extends BasePollRequestWebService
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
    public function getVersion()
    {
        return '2.1';
    }
}