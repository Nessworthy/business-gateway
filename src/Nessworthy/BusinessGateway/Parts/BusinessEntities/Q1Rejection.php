<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\ResponseSearchByPropertyDescriptionV2_0\Q1ExternalReference;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Rejection
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property Q1ExternalReference ExternalReference
 * @property Q1RejectionResponse RejectionResponse
 */
class Q1Rejection extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('ExternalReference', 1, 1);
        $this->defineChild('RejectionResponse', 1, 1);
    }

    /**
     * Q1Rejection constructor.
     * @param Q1ExternalReference $externalReference
     * @param Q1RejectionResponse $rejectionResponse
     */
    public function __construct(
        Q1ExternalReference $externalReference,
        Q1RejectionResponse $rejectionResponse
    )
    {
        parent::__construct();
        $this->addChild('ExternalReference', $externalReference);
        $this->addChild('RejectionResponse', $rejectionResponse);
    }

}