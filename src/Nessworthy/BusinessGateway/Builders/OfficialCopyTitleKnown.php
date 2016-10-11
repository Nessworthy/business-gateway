<?php
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
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1TitleKnownOfficialCopy;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1\Q1CustomerReference;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1\Q1ExternalReference;
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
    public function setMessageId($messageId)
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
        $typeOfDocument,
        $dateOfDocument = null,
        $titleNumberFiledUnder = null,
        $additionalInformation = null
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
    public function setExternalReference($reference, $allocatedBy = null, $description = null)
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

    public function setCustomerReference($reference, $allocatedBy = null, $description = null)
    {
        $reference = new Q1CustomerReference(new ReferenceText($reference));

        if($allocatedBy) {
            $reference->setAllocatedBy(new Q3Text($allocatedBy));
        }
        if($description) {
            $reference->setDescription(new Q3Text($description));
        }

        $this->customerReference = $reference;
    }

    public function setTitle($titleNumber, $tenureCode = null)
    {
        $property = new Q1SubjectProperty(
            new Q2Text($titleNumber)
        );

        if($tenureCode) {
            $property->setTenureCodeType(new TenureCode($tenureCode));
        }

        $this->property = $property;
    }

    public function setExpectedPrice($grossPriceAmount = null, $netPriceAmount = null, $vatAmount = null)
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

    public function setAlternativeDespatchName($alternativeDespatchName)
    {
        $this->alternativeDespatchName = new DespatchNameText($alternativeDespatchName);
    }

    public function setAlternativeDespatchReference($alternativeDespatchReference)
    {
        $this->alternativeDespatchReference = new Q4Text($alternativeDespatchReference);
    }

    public function setAlternativeDespatchAddress(
        array $addressLines = null,
        $postcode = null,
        $dxNumber  = null,
        $exchangeName = null
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

    public function setPropertyDescription($propertyDescription)
    {
        $this->propertyDescription = new PropertyDescriptionText($propertyDescription);
    }

    public function setOfficialCopyCode($officialCopyCode)
    {
        $this->officialCopyCode = new OfficialCopyCode($officialCopyCode);
    }

    public function setContinueIfTitleIsClosedAndContinued($indicate) {
        $this->continueIfTitleIsClosedAndContinued = new Indicator($indicate);
    }

    public function setNotifyIfPendingFirstRegistration($indicate) {
        $this->notifyIfPendingFirstRegistration = new Indicator($indicate);
    }

    public function setNotifyIfPendingApplication($indicate) {
        $this->notifyIfPendingApplication = new Indicator($indicate);
    }

    public function setSendBackDated($indicate) {
        $this->sendBackDated = new Indicator($indicate);
    }

    public function setContinueIfActualFeeExceedsExpectedFee($indicate) {
        $this->continueIfActualFeeExceedsExpectedFee = new Indicator($indicate);
    }

    public function setRequestedOfficialCopyCode($officialCopyCode) {
        $this->requestedOfficialCopyCode = new RequestedOfficialCopyCode($officialCopyCode);
    }

    public function addEstatePlanPlotNumber($estatePlanPlotNumber) {
        $this->estatePlanPlotNumbers[] = new NumericType($estatePlanPlotNumber);
    }

    public function addContact($name, $telephone)
    {
        $name = new Q3Text($name);
        $communication = new Q1Communication(new Q3Text($telephone));

        $contact = new Q1Contact($name, $communication);
        $this->contacts[] = $contact;
    }

    public function buildRequest()
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
        $this->titleKnownOfficialCopy = $titleKnownOfficialCopy;

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