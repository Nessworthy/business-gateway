<?php
namespace Nessworthy\BusinessGateway\Services;

class OfficialCopyTitleKnownPoll extends BasePollRequestWebService
{
    /**
     * @inheritDoc
     */
    protected function getServiceName()
    {
        return 'EnquiryByPropertyDescription';
    }

    /**
     * @inheritDoc
     */
    public function getVersion()
    {
        return '2.1';
    }
}