<?php
namespace Nessworthy\BusinessGateway\Services;

class EnquiryByPropertyDescriptionPoll extends BasePollRequestWebService
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
        return '2.0';
    }
}