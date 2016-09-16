<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\DateTime;
use Nessworthy\BusinessGateway\Parts\Content\Identifier;
use Nessworthy\BusinessGateway\Parts\Content\Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1AcknowledgementDetails
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * TODO: Properties, other documentation.
 */
class Q1AcknowledgementDetails extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('UniqueID', 1, 1);
        $this->defineChild('ExpectedResponseDateTime', 1, 1);
        $this->defineChild('MessageDescription', 1, 1);
    }

    public function __construct(
        Identifier $uniqueId,
        DateTime $expectedResponseDateTime,
        Text $messageDescription
    )
    {
        parent::__construct();
        $this->addChild('UniqueID', $uniqueId);
        $this->addChild('ExpectedResponseDateTime', $expectedResponseDateTime);
        $this->addChild('MessageDescription', $messageDescription);
    }

}