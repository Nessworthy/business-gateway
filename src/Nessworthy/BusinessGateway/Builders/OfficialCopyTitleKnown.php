<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Builders;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1AlternativeDespatchAddress;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1AlternativeDespatchDetails;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1AlternativePostalAddress;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1CertificateInFormCI;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1Communication;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1Contact;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1DocumentDetails;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1DXDetails;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1ExpectedPrice;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1\Q1TitleKnownOfficialCopy;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1CustomerReference;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1ExternalReference;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1\Q1Product;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1\Q1SubjectProperty;
use Nessworthy\BusinessGateway\Parts\Content\Amount;
use Nessworthy\BusinessGateway\Parts\Content\Date;
use Nessworthy\BusinessGateway\Parts\Content\DespatchNameText;
use Nessworthy\BusinessGateway\Parts\Content\Indicator;
use Nessworthy\BusinessGateway\Parts\Content\NumericType;
use Nessworthy\BusinessGateway\Parts\Content\OfficialCopyCode;
use Nessworthy\BusinessGateway\Parts\Content\PropertyDescriptionText;
use Nessworthy\BusinessGateway\Parts\Content\Q1Text;
use Nessworthy\BusinessGateway\Parts\Content\Q2Text;
use Nessworthy\BusinessGateway\Parts\Content\Q3Text;
use Nessworthy\BusinessGateway\Parts\Content\Q4Text;
use Nessworthy\BusinessGateway\Parts\Content\ReferenceText;
use Nessworthy\BusinessGateway\Parts\Content\RequestedOfficialCopyCode;
use Nessworthy\BusinessGateway\Parts\Content\TenureCode;
use Nessworthy\BusinessGateway\Parts\Content\TypeOfDocumentCode;
use Nessworthy\BusinessGateway\Parts\Documents\RequestTitleKnownOfficialCopyV2_1;
use Nessworthy\BusinessGateway\System\Builder;

/**
 * Class OfficialCopyTitleKnown
 * Build an official copy title known request for the land registry API.
 * Used to fetch information regarding a property based on a title ID.
 * Use EnquiryByPropertyDescription first to acquire a title ID based on a property address.
 * @package Nessworthy\BusinessGateway\Builders
 */
class OfficialCopyTitleKnown implements Builder
{
    private $messageId;
    private $documentDetails = [];
    private $externalReference;
    private $customerReference;
    private $property;
    private $expectedPrice;
    private $contacts = [];

    // Alternative Despatch Details
    private $alternativeDespatchName;
    private $alternativeDespatchReference;
    private $alternativeDespatchAddress;

    // Title Known Official Copy
    private $propertyDescription;
    private $officialCopyCode;
    private $continueIfTitleIsClosedAndContinued;
    private $notifyIfPendingFirstRegistration;
    private $requestedOfficialCopyCode;
    private $continueIfActualFeeExceedsExpectedFee;
    private $notifyIfPendingApplication;
    private $sendBackDated;
    private $estatePlanPlotNumbers = [];

    /**
     * Set a unique message ID for this request.
     * This is used to refer to a specific request for debugging, and needed for using the polling service.
     * @param string $messageId A unique alphanumeric message ID between 5 and 50 characters; dashes are allowed.
     */
    public function setMessageId(string $messageId)
    {
        $messageId = new Q1Text($messageId);
        $this->messageId = $messageId;
    }

    /**
     * Add a document request from the Land Registry for this request.
     * @see TypeOfDocumentCode For type of document codes.
     * @param string $typeOfDocument
     * @param null|string $dateOfDocument
     * @param null|string $titleNumberFiledUnder
     * @param null|string $additionalInformation
     */
    public function addDocumentDetails(
        string $typeOfDocument,
        string $dateOfDocument = null,
        string $titleNumberFiledUnder = null,
        string $additionalInformation = null
    )
    {
        $typeOfDocument = new TypeOfDocumentCode($typeOfDocument);
        $document = new Q1DocumentDetails($typeOfDocument);

        if($dateOfDocument) {
            $document->setDateOfDocumentDate(new Date($dateOfDocument));
        }

        if($titleNumberFiledUnder) {
            $document->setTitleNumberFiledUnder(new Q2Text($titleNumberFiledUnder));
        }

        if($additionalInformation) {
            $document->setAdditionalInformation(new Q3Text($additionalInformation));
        }

        $this->documentDetails[] = $document;
    }

    /**
     * Set an external reference ID for this request.
     * This reference number should be your own system's reference ID for this request.
     * @param string $reference A unique reference identifier, between 1 and 25 characters.
     * @param null|string $allocatedBy Currently unused. Who this reference was allocated by.
     * @param null|string $description Currently unused. An optional description about this reference.
     */
    public function setExternalReference(string $reference, string $allocatedBy = null, string $description = null)
    {
        $externalReference = new Q1ExternalReference(new ReferenceText($reference));

        if($allocatedBy) {
            $externalReference->setAllocatedBy(new Q3Text($allocatedBy));
        }
        if($description) {
            $externalReference->setDescription(new Q3Text($description));
        }

        $this->externalReference = $externalReference;
    }

    /**
     * Set the customer CMS reference.
     * @param string $reference
     * @param string|null $allocatedBy
     * @param string|null $description
     */
    public function setCustomerReference(string $reference, string $allocatedBy = null, string $description = null)
    {
        $reference = new Q1CustomerReference(new ReferenceText($reference));

        if(!is_null($allocatedBy)) {
            $reference->setAllocatedBy(new Q3Text($allocatedBy));
        }
        if(!is_null($description)) {
            $reference->setDescription(new Q3Text($description));
        }

        $this->customerReference = $reference;
    }

    /**
     * Set the official title number to fetch information for,
     * as well as an optional tenure code.
     * @see TenureCode For acceptable TenureCode inputs.
     * @param string $titleNumber
     * @param string|null $tenureCode
     */
    public function setTitle(string $titleNumber, string $tenureCode = null)
    {
        $property = new Q1SubjectProperty(
            new Q2Text($titleNumber)
        );

        if($tenureCode) {
            $property->setTenureCodeType(new TenureCode($tenureCode));
        }

        $this->property = $property;
    }

    /**
     * Set the expected price(s) for this property.
     * @param float|null $grossPriceAmount
     * @param float|null $netPriceAmount
     * @param float|null $vatAmount
     */
    public function setExpectedPrice(
        float $grossPriceAmount = null,
        float $netPriceAmount = null,
        float $vatAmount = null
    )
    {
        $expectedPrice = new Q1ExpectedPrice();

        if($grossPriceAmount) {
            $expectedPrice->setGrossPriceAmount(new Amount($grossPriceAmount));
        }

        if($netPriceAmount) {
            $expectedPrice->setNetPriceAmount(new Amount($netPriceAmount));
        }

        if($vatAmount) {
            $expectedPrice->setVATAmount(new Amount($vatAmount));
        }

        $this->expectedPrice = $expectedPrice;
    }

    /**
     * Set the alternative despatch name.
     * @param string $alternativeDespatchName
     */
    public function setAlternativeDespatchName(string $alternativeDespatchName)
    {
        $this->alternativeDespatchName = new DespatchNameText($alternativeDespatchName);
    }

    /**
     * Set the alternative despatch reference.
     * @param $alternativeDespatchReference
     */
    public function setAlternativeDespatchReference($alternativeDespatchReference)
    {
        $this->alternativeDespatchReference = new Q4Text($alternativeDespatchReference);
    }

    /**
     * Set the alternative despatch address.
     * @param string[]|null $addressLines
     * @param string|null $postcode
     * @param string|null $dxNumber
     * @param string|null $exchangeName
     */
    public function setAlternativeDespatchAddress(
        array $addressLines = null,
        string $postcode = null,
        string $dxNumber  = null,
        string $exchangeName = null
    )
    {
        $despatchAddress = new Q1AlternativeDespatchAddress();

        if($addressLines || $postcode) {
            $alternativePostalAddress = new Q1AlternativePostalAddress();
            if(count($addressLines) > 0) {
                foreach($addressLines as $key => $addressLine) {
                    $addressLines[$key] = new Q3Text($addressLine);
                }
                $alternativePostalAddress->setAddressLine($addressLines);
            }
            if($postcode) {
                $alternativePostalAddress->setPostcode(new Q3Text($postcode));
            }
            $despatchAddress->setPostalAddress($alternativePostalAddress);
        }

        if($dxNumber || $exchangeName) {
            $dxDetails = new Q1DXDetails(new Q3Text($dxNumber), new Q3Text($exchangeName));
            $despatchAddress->setDXDetails($dxDetails);
        }

        $this->alternativeDespatchAddress = $despatchAddress;
    }

    /**
     * Set a property description.
     * @param string $propertyDescription
     */
    public function setPropertyDescription(string $propertyDescription)
    {
        $this->propertyDescription = new PropertyDescriptionText($propertyDescription);
    }

    /**
     * Set the official copy code.
     * @see OfficialCopyCode for acceptable inputs.
     * @param string $officialCopyCode
     */
    public function setOfficialCopyCode(string $officialCopyCode)
    {
        $this->officialCopyCode = new OfficialCopyCode($officialCopyCode);
    }

    /**
     * Indicate to continue processing this request if the title # is closed
     * and continued.
     * @param bool $indicate
     */
    public function setContinueIfTitleIsClosedAndContinued(bool $indicate) {
        $this->continueIfTitleIsClosedAndContinued = new Indicator($indicate);
    }

    /**
     * Indicate to notify the callee if the title is pending first registration.
     * @param bool $indicate
     */
    public function setNotifyIfPendingFirstRegistration(bool $indicate) {
        $this->notifyIfPendingFirstRegistration = new Indicator($indicate);
    }

    /**
     * Indicate to notify the callee if the title registration is pending.
     * @param bool $indicate
     */
    public function setNotifyIfPendingApplication(bool $indicate) {
        $this->notifyIfPendingApplication = new Indicator($indicate);
    }

    /**
     * TODO
     * @param bool $indicate
     */
    public function setSendBackDated(bool $indicate) {
        $this->sendBackDated = new Indicator($indicate);
    }

    /**
     * Indicate to continue processing if the actual fee of the title exceeds the fee expected.
     * @param bool $indicate
     */
    public function setContinueIfActualFeeExceedsExpectedFee(bool $indicate) {
        $this->continueIfActualFeeExceedsExpectedFee = new Indicator($indicate);
    }

    /**
     * Set the requested official copy code.
     * @see RequestedOfficialCopyCode for acceptable inputs.
     * @param string $officialCopyCode
     */
    public function setRequestedOfficialCopyCode(string $officialCopyCode) {
        $this->requestedOfficialCopyCode = new RequestedOfficialCopyCode($officialCopyCode);
    }

    /**
     * TODO
     * @param float $estatePlanPlotNumber
     */
    public function addEstatePlanPlotNumber(float $estatePlanPlotNumber) {
        $this->estatePlanPlotNumbers[] = new NumericType($estatePlanPlotNumber);
    }

    /**
     * Add a contact for this request.
     * Can be called multiple times to add more contacts.
     * @param string $name
     * @param string $telephone
     */
    public function addContact(string $name, string $telephone)
    {
        $name = new Q3Text($name);
        $communication = new Q1Communication(new Q3Text($telephone));

        $contact = new Q1Contact($name, $communication);
        $this->contacts[] = $contact;
    }

    /**
     * Build the full request.
     * @return RequestTitleKnownOfficialCopyV2_1
     */
    public function buildRequest() : RequestTitleKnownOfficialCopyV2_1
    {
        $id = new Q1Identifier($this->messageId);

        $titleKnownOfficialCopy = new Q1TitleKnownOfficialCopy(
            $this->propertyDescription,
            $this->officialCopyCode,
            $this->continueIfTitleIsClosedAndContinued,
            $this->notifyIfPendingFirstRegistration,
            $this->notifyIfPendingApplication,
            $this->sendBackDated,
            $this->continueIfActualFeeExceedsExpectedFee
        );

        if($this->requestedOfficialCopyCode) {
            $titleKnownOfficialCopy->setRequestedOfficialCopyCode(
                new RequestedOfficialCopyCode($this->requestedOfficialCopyCode)
            );
        }

        if(count($this->estatePlanPlotNumbers) > 0) {
            $titleKnownOfficialCopy->setCertificateInFormCI(
                new Q1CertificateInFormCI(
                    $this->estatePlanPlotNumbers
                )
            );
        }

        $product = new Q1Product(
            $this->externalReference,
            $this->customerReference,
            $this->property,
            $this->contacts,
            $titleKnownOfficialCopy
        );

        if(count($this->documentDetails)) {
            $product->setDocumentDetails($this->documentDetails);
        }

        if($this->expectedPrice) {
            $product->setExpectedPrice($this->expectedPrice);
        }

        if($this->alternativeDespatchAddress || $this->alternativeDespatchReference || $this->alternativeDespatchName) {
            $alternativeDespatchDetails = new Q1AlternativeDespatchDetails();

            if($this->alternativeDespatchName) {
                $alternativeDespatchDetails->setAlternativeDespatchName($this->alternativeDespatchName);
            }

            if($this->alternativeDespatchReference) {
                $alternativeDespatchDetails->setAlternativeDespatchReference($this->alternativeDespatchReference);
            }

            if($this->alternativeDespatchAddress) {
                $alternativeDespatchDetails->setAlternativeDespatchAddress($this->alternativeDespatchAddress);
            }

            $product->setAlternativeDespatchDetails($alternativeDespatchDetails);
        }

        $request = new RequestTitleKnownOfficialCopyV2_1($id, $product);

        return $request;
    }
}