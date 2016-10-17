<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1AlternativeDespatchDetails;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1Contact;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1CustomerReference;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1DocumentDetails;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1ExpectedPrice;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1ExternalReference;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Product
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1
 * @property null|Q1DocumentDetails[] DocumentDetails
 * @property Q1ExternalReference ExternalReference
 * @property Q1CustomerReference CustomerReference
 * @property Q1SubjectProperty SubjectProperty
 * @property null|Q1ExpectedPrice ExpectedPrice
 * @property Q1Contact[] Contact
 * @property Q1TitleKnownOfficialCopy TitleKnownOfficialCopy
 * @property null|Q1AlternativeDespatchDetails AlternativeDespatchDetails
 */
class Q1Product extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('DocumentDetails', 0, BaseComplexType::UNBOUNDED);
        $this->defineChild('ExternalReference', 1, 1);
        $this->defineChild('CustomerReference', 1, 1);
        $this->defineChild('SubjectProperty', 1, 1);
        $this->defineChild('ExpectedPrice', 0, 1);
        $this->defineChild('Contact', 1, BaseComplexType::UNBOUNDED);
        $this->defineChild('TitleKnownOfficialCopy', 1, 1);
        $this->defineChild('AlternativeDespatchDetails', 0, 1);
    }

    /**
     * Q1Product constructor.
     * @param Q1ExternalReference $externalReference
     * @param Q1CustomerReference $customerReference
     * @param Q1SubjectProperty $subjectProperty
     * @param Q1Contact[] $contact
     * @param Q1TitleKnownOfficialCopy $titleKnownOfficialCopy
     */
    public function __construct(
        Q1ExternalReference $externalReference,
        Q1CustomerReference $customerReference,
        Q1SubjectProperty $subjectProperty,
        array $contact,
        Q1TitleKnownOfficialCopy $titleKnownOfficialCopy
    ) {
        parent::__construct();
        $this->addChild('ExternalReference', $externalReference);
        $this->addChild('CustomerReference', $customerReference);
        $this->addChild('SubjectProperty', $subjectProperty);
        $this->addChild('Contact', $contact);
        $this->addChild('TitleKnownOfficialCopy', $titleKnownOfficialCopy);
    }

    /**
     * @param Q1DocumentDetails[] $documentDetails
     */
    public function setDocumentDetails(array $documentDetails)
    {
        $this->addChild('DocumentDetails', $documentDetails);
    }

    /**
     * @param Q1ExpectedPrice $expectedPrice
     */
    public function setExpectedPrice(Q1ExpectedPrice $expectedPrice)
    {
        $this->addChild('ExpectedPrice', $expectedPrice);
    }

    /**
     * @param Q1AlternativeDespatchDetails $alternativeDespatchDetails
     */
    public function setAlternativeDespatchDetails(Q1AlternativeDespatchDetails $alternativeDespatchDetails)
    {
        $this->addChild('AlternativeDespatchDetails', $alternativeDespatchDetails);
    }
}
