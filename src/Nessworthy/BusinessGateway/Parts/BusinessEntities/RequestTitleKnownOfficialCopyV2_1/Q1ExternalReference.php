<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1;
use Nessworthy\BusinessGateway\Parts\Content\Q3Text;
use Nessworthy\BusinessGateway\Parts\Content\ReferenceText;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1ExternalReference
 * A unique reference given to identify a particular request,
 * order or instruction in the system of the organisation allocating
 * it with the ability to associate the name of the Company that has allocated it.
 *
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property ReferenceText Reference A unique reference.
 * @property Q3Text|null AllocatedBy Not officially used.
 * @property Q3Text|null Description Not officially used.
 */
class Q1ExternalReference extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Reference', 1, 1);
        $this->defineChild('AllocatedBy', 0, 1);
        $this->defineChild('Description', 0, 1);
    }

    /**
     * Q1ExternalReference constructor.
     * @param ReferenceText $reference
     */
    public function __construct(ReferenceText $reference)
    {
        parent::__construct();

        $this->addChild('Reference', $reference);
    }

    /**
     * AllocatedBy by isn't officially used.
     * @param Q3Text $allocatedBy
     */
    public function setAllocatedBy(Q3Text $allocatedBy)
    {
        $this->addChild('AllocatedBy', $allocatedBy);
    }

    /**
     * Description by isn't officially used.
     * @param Q3Text $description
     */
    public function setDescription(Q3Text $description)
    {
        $this->addChild('Description', $description);
    }
}