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
        return 'searchProperties';
    }

    /**
     * @inheritDoc
     */
    public function getVersion()
    {
        return '2.0';
    }

    /**
     * @inheritDoc
     */
    public function getNamespace()
    {
        return 'http://www.oscre.org/ns/eReg-Final/2011/RequestSearchByPropertyDescriptionV2_0';
    }


}