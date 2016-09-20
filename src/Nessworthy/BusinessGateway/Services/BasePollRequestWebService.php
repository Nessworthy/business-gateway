<?php
namespace Nessworthy\BusinessGateway\Services;

abstract class BasePollRequestWebService extends Base
{
    /**
     * @inheritDoc
     */
    protected function getServiceType()
    {
        return 'PollRequestWebService';
    }

    /**
     * @inheritDoc
     */
    public function getRequestName()
    {
        return 'PollRequest';
    }

}