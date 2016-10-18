<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Services;

/**
 * Class EnquiryByPropertyDescriptionPoll
 * Service which represents a Search By Property Description poll request.
 * @package Nessworthy\BusinessGateway\Services
 */
class EnquiryByPropertyDescriptionPoll extends BasePollRequestWebService
{
    /**
     * @inheritDoc
     */
    public function getServiceName() : string
    {
        return 'EnquiryByPropertyDescription';
    }

    /**
     * @inheritDoc
     */
    public function getVersion() : string
    {
        return '2.0';
    }
}