<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Content\DateTime;
use Isg\BusinessGateway\Parts\Content\Identifier;
use Isg\BusinessGateway\Parts\Content\Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1AcknowledgementDetails
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property Identifier UniqueID
 * @property DateTime ExpectedResponseDateTime
 * @property Text MessageDescription
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
    ) {
        parent::__construct();
        $this->addChild('UniqueID', $uniqueId);
        $this->addChild('ExpectedResponseDateTime', $expectedResponseDateTime);
        $this->addChild('MessageDescription', $messageDescription);
    }
}
