<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0;

use Isg\BusinessGateway\Parts\Content\ReferenceText;
use Isg\BusinessGateway\Parts\Content\Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1CustomerReference
 * Holds a unique identifying reference for the customer.
 *
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property ReferenceText Reference A unique reference.
 * @property Text|null AllocatedBy Not officially used.
 * @property Text|null Description Not officially used.
 */
class Q1CustomerReference extends BaseComplexType
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
     * Q1CustomerReference constructor.
     * @param ReferenceText $reference
     */
    public function __construct(ReferenceText $reference)
    {
        parent::__construct();

        $this->addChild('Reference', $reference);
    }

    /**
     * AllocatedBy by isn't officially used.
     * @param Text $allocatedBy
     */
    public function setAllocatedBy(Text $allocatedBy)
    {
        $this->addChild('AllocatedBy', $allocatedBy);
    }

    /**
     * Description by isn't officially used.
     * @param Text $description
     */
    public function setDescription(Text $description)
    {
        $this->addChild('Description', $description);
    }
}
