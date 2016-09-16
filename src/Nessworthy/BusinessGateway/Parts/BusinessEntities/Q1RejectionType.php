<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\ResponseSearchByPropertyDescriptionV2_0\Q1ExternalReference;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1RejectionType extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('ExternalReference', 1, 1);
        $this->defineChild('RejectionResponse', 1, 1);
    }

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