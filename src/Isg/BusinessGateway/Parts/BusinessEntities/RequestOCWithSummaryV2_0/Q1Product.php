<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0;

use Isg\BusinessGateway\Parts\BusinessEntities\Q1CustomerReference;
use Isg\BusinessGateway\Parts\BusinessEntities\Q1ExpectedPrice;
use Isg\BusinessGateway\Parts\BusinessEntities\Q1ExternalReference;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Product
 * This is bundled into this request because other requests use a similarly named element but contain
 * different child types.
 * @package Isg\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0
 * @property Q1SubjectProperty SubjectProperty
 * @property Q1ExpectedPrice ExpectedPrice
 * @property Q1ExternalReference ExternalReference
 * @property Q1CustomerReference CustomerReference
 * @property Q1TitleKnownOfficialCopy TitleKnownOfficialCopy
 */
class Q1Product extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('SubjectProperty', 1, 1);
        $this->defineChild('ExpectedPrice', 0, 1);
        $this->defineChild('ExternalReference', 1, 1);
        $this->defineChild('CustomerReference', 1, 1);
        $this->defineChild('TitleKnownOfficialCopy', 1, 1);
    }

    /**
     * Q1Product constructor.
     * @param Q1SubjectProperty $subjectProperty
     * @param Q1ExpectedPrice $expectedPrice
     * @param Q1ExternalReference $externalReference
     * @param Q1CustomerReference $customerReference
     * @param Q1TitleKnownOfficialCopy $titleKnownOfficialCopy
     */
    public function __construct(
        Q1SubjectProperty $subjectProperty,
        Q1ExpectedPrice $expectedPrice,
        Q1ExternalReference $externalReference,
        Q1CustomerReference $customerReference,
        Q1TitleKnownOfficialCopy $titleKnownOfficialCopy
    ) {
        parent::__construct();
        $this->addChild('SubjectProperty', $subjectProperty);
        $this->addChild('ExpectedPrice', $expectedPrice);
        $this->addChild('ExternalReference', $externalReference);
        $this->addChild('CustomerReference', $customerReference);
        $this->addChild('TitleKnownOfficialCopy', $titleKnownOfficialCopy);
    }
}
