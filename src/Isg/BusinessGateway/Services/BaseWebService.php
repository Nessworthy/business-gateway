<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Services;

/**
 * Class BaseWebService
 * Holds information about a web service, as opposed to a poll request web service.
 * @package Isg\BusinessGateway\Services
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
