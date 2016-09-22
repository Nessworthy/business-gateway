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
use Nessworthy\BusinessGateway\Parts\Content\RequestedOfficialCopyCode;
use Nessworthy\BusinessGateway\Parts\Content\TenureCode;
use Nessworthy\BusinessGateway\Parts\Content\TypeOfDocumentCode;
use Nessworthy\BusinessGateway\Parts\Documents\RequestTitleKnownOfficialCopyV2_1;
use Nessworthy\BusinessGateway\System\Builder;

class OfficialCopyTitleKnown implements Builder
{
    private $messageId;
    private $documentDetails = [];
    private $externalReference;
    private $customerReference;
    private $property;
    private $expectedPrice;
    private $titleKnownOfficialCopy;
    private $contacts = [];

    // Alternative Despatch Details
    private $alternativeDespatchName;
    private $alternativeDespatchReference;
    private $alternativeDespatchAddress;


    public function setMessageId($messageId)
    {
        $messageId = new Q1Text($messageId);
        $this->messageId = $messageId;
    }

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

    public function setProperty($titleNumber, $tenureCode = null)
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

        $this->expectedPrice = null;
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

    public function setTitleKnownOfficialCopy(
        $propertyDescription,
        $officialCopyType,
        $continueIfTitleIsClosedAndContinued,
        $notifyIfPendingFirstRegistration,
        $notifyIfPendingApplication,
        $sendBackDated,
        $continueIfActualFeeExceedsExpectedFee,
        $requestedOfficialCopyCode = null,
        array $estatePlanPlotNumbers = []
    )
    {
        $titleKnownOfficialCopy = new Q1TitleKnownOfficialCopy(
            new PropertyDescriptionText($propertyDescription),
            new OfficialCopyCode($officialCopyType),
            new Indicator($continueIfTitleIsClosedAndContinued),
            new Indicator($notifyIfPendingFirstRegistration),
            new Indicator($notifyIfPendingApplication),
            new Indicator($sendBackDated),
            new Indicator($continueIfActualFeeExceedsExpectedFee)
        );

        if($requestedOfficialCopyCode) {
            $titleKnownOfficialCopy->setRequestedOfficialCopyCode(
                new RequestedOfficialCopyCode($requestedOfficialCopyCode)
            );
        }

        if(count($estatePlanPlotNumbers) > 0) {
            foreach($estatePlanPlotNumbers as $key => $value) {
                $estatePlanPlotNumbers[$key] = new NumericType($value);
            }
            $titleKnownOfficialCopy->setCertificateInFormCI(
                new Q1CertificateInFormCI(
                    $estatePlanPlotNumbers
                )
            );
        }
        $this->titleKnownOfficialCopy = $titleKnownOfficialCopy;
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

        $product = new Q1Product(
            $this->externalReference,
            $this->customerReference,
            $this->property,
            $this->contacts,
            $this->titleKnownOfficialCopy
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