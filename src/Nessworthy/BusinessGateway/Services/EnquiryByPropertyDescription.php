<?php
namespace Nessworthy\BusinessGateway\Services;

class EnquiryByPropertyDescription extends BaseWebService
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
    public function getRequestName()
    {
        return 'RequestSearchByPropertyDescriptionV2_0';
    }

    /**
     * @inheritDoc
     */
    public function getVersion()
    {
        return '2.0';
    }
}