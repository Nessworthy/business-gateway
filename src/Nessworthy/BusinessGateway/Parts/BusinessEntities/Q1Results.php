<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\ResponseSearchByPropertyDescriptionV2_0\Q1ExternalReference;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Results
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property null|Q1MessageDetails MessageDetails
 * @property Q1ExternalReference ExternalReference
 * @property Q1Title[] Title
 */
class Q1Results extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('MessageDetails', 0, 1);
        $this->defineChild('ExternalReference', 1, 1);
        $this->defineChild('Title', 1, BaseComplexType::UNBOUNDED);
    }

    /**
     * Q1Results constructor.
     * @param Q1ExternalReference $externalReference
     */
    public function __construct(Q1ExternalReference $externalReference)
    {
        parent::__construct();
        $this->addChild('ExternalReference', $externalReference);
    }

    /**
     * @param Q1MessageDetails $messageDetails
     */
    public function setMessageDetails(Q1MessageDetails $messageDetails)
    {
        $this->addChild('MessageDetails', $messageDetails);
    }

    /**
     * @param Q1Title[] $title
     */
    public function setTitle(array $title) {
        $this->addChild('Title', $title);
    }

}