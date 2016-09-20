<?php
namespace Nessworthy\BusinessGateway\Services;

abstract class BaseWebService extends Base
{
    /**
     * @inheritDoc
     */
    protected function getServiceType()
    {
        return 'WebService';
    }

}