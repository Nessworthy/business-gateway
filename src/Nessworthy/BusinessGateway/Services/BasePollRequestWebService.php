<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Services;

/**
 * Class BasePollRequestWebService
 * Base implementation class specifically for poll requests.
 * @package Nessworthy\BusinessGateway\Services
 */
abstract class BasePollRequestWebService extends Base
{
    /**
     * @inheritDoc
     */
    protected function getServiceType() : string
    {
        return 'PollWebService';
    }

    /**
     * @inheritDoc
     */
    public function getRequestName() : string
    {
        return 'PollRequest';
    }

    /**
     * @inheritDoc
     */
    public function getNamespace() : string
    {
        return 'http://www.oscre.org/ns/eReg/MR01-20090605/PollRequest';
    }
}