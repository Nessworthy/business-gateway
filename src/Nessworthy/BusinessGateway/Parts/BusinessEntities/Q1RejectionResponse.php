<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1RejectionResponse extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Reason', 1, 1);
        $this->defineChild('Code', 1, 1);
        $this->defineChild('OtherDescription', 0, 1);
        $this->defineChild('ValidationErrors', 0, BaseComplexType::UNBOUNDED);
    }

    public function __construct(
        Text $reason,
        Text $code
    )
    {
        parent::__construct();
        $this->addChild('Reason', $reason);
        $this->addChild('Code', $code);
    }

    public function setOtherDescription(Text $otherDescription)
    {
        $this->addChild('OtherDescription', $otherDescription);
    }

    /**
     * @param Q1ValidationErrors[] $validationErrors
     */
    public function setValidationErrors(array $validationErrors)
    {
        $this->addChild('ValidationErrors', $validationErrors);
    }
}