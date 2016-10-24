<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0;

use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Product
 * This is bundled into this request because other requests use a similarly named element but contain
 * different child types.
 * @package Isg\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0
 * @property Q1ExternalReference ExternalReference
 * @property Q1CustomerReference CustomerReference
 * @property Q1SubjectProperty SubjectProperty
 */
class Q1Product extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        /**
         * Define which children this class contains.
         * Calling addChild using an undefined key will throw an exception.
         * (This is so "optional" keys are still defined, just as empty values)
         */
        $this->defineChild('ExternalReference', 1, 1);
        $this->defineChild('CustomerReference', 1, 1);
        $this->defineChild('SubjectProperty', 1, 1);
    }

    /**
     * Q1Product constructor.
     * @param Q1ExternalReference $externalReference
     * @param Q1CustomerReference $customerReference
     * @param Q1SubjectProperty $subjectProperty
     */
    public function __construct(
        Q1ExternalReference $externalReference,
        Q1CustomerReference $customerReference,
        Q1SubjectProperty $subjectProperty
    ) {
        parent::__construct();
        $this->addChild('ExternalReference', $externalReference);
        $this->addChild('CustomerReference', $customerReference);
        $this->addChild('SubjectProperty', $subjectProperty);
    }
}
