<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Services;

/**
 * Class BaseWebService
 * Holds information about a web service, as opposed to a poll request web service.
 * @package Nessworthy\BusinessGateway\Services
 */
abstract class BaseWebService extends Base
{
    /**
     * @inheritDoc
     */
    protected function getServiceType() : string
    {
        return 'WebService';
    }
}
