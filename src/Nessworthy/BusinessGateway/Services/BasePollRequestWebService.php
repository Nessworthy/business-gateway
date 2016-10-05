<?php
namespace Nessworthy\BusinessGateway\Services;

abstract class BasePollRequestWebService extends Base
{
    /**
     * @inheritDoc
     */
    protected function getServiceType()
    {
        return 'PollWebService';
    }

    /**
     * @inheritDoc
     */
    public function getRequestName()
    {
        return 'PollRequest';
    }

    /**
     * @inheritDoc
     */
    public function getNamespace()
    {
        return 'http://www.oscre.org/ns/eReg/MR01-20090605/PollRequest';
    }
}