<?php declare(strict_types = 1);
namespace Nessworthy\BusinessGateway\Builders;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1CustomerReference;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1ExpectedPrice;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1ExternalReference;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0\Q1Product;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0\Q1SubjectProperty;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0\Q1TitleKnownOfficialCopy;
use Nessworthy\BusinessGateway\Parts\ComplexType;
use Nessworthy\BusinessGateway\Parts\Content\Amount;
use Nessworthy\BusinessGateway\Parts\Content\Indicator;
use Nessworthy\BusinessGateway\Parts\Content\Q1Text;
use Nessworthy\BusinessGateway\Parts\Content\Q2Text;
use Nessworthy\BusinessGateway\Parts\Content\Q3Text;
use Nessworthy\BusinessGateway\Parts\Content\ReferenceText;
use Nessworthy\BusinessGateway\Parts\Documents\RequestOCWithSummary;
use Nessworthy\BusinessGateway\System\Builder;

class OfficialCopyWithSummary implements Builder
{
    private $messageId;
    private $titleNumber;

    private $grossPriceAmount;
    private $netPriceAmount;
    private $vatAmount;

    private $customerReference;
    private $externalReference;

    private $continueIfTitleIsClosedAndContinued;
    private $notifyIfPendingFirstRegistration;
    private $notifyIfPendingApplication;
    private $sendBackDated;
    private $continueIfActualFeeExceedsExpectedFee;
    private $includeTitlePlan;

    public function setContinueIfTitleIsClosedAndContinued(bool $indicator)
    {
        $this->continueIfTitleIsClosedAndContinued = new Indicator($indicator);
    }

    public function setNotifyIfPendingFirstRegistration(bool $indicator)
    {
        $this->notifyIfPendingFirstRegistration = new Indicator($indicator);
    }

    public function setNotifyIfPendingApplication(bool $indicator)
    {
        $this->notifyIfPendingApplication = new Indicator($indicator);
    }

    public function setSendBackDated(bool $indicator)
    {
        $this->sendBackDated = new Indicator($indicator);
    }

    public function setContinueIfActualFeeExceedsExpectedFee(bool $indicator)
    {
        $this->continueIfActualFeeExceedsExpectedFee = new Indicator($indicator);
    }

    public function setIncludeTitlePlan(bool $indicator)
    {
        $this->includeTitlePlan = new Indicator($indicator);
    }

    public function setMessageId(string $messageId)
    {
        $this->messageId = new Q1Text($messageId);
    }

    public function setTitleNumber(string $titleNumber)
    {
        $this->titleNumber = new Q2Text($titleNumber);
    }

    public function setGrossPriceAmount(float $amount)
    {
        $this->grossPriceAmount = new Amount($amount);
    }

    public function setNetPriceAmount(float $amount)
    {
        $this->netPriceAmount = new Amount($amount);
    }

    public function setVATAmount(float $vatAmount)
    {
        $this->vatAmount = new Amount($vatAmount);
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

        if ($allocatedBy) {
            $externalReference->setAllocatedBy(new Q3Text($allocatedBy));
        }
        if ($description) {
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

        if (!is_null($allocatedBy)) {
            $reference->setAllocatedBy(new Q3Text($allocatedBy));
        }
        if (!is_null($description)) {
            $reference->setDescription(new Q3Text($description));
        }

        $this->customerReference = $reference;
    }

    /**
     * @inheritDoc
     */
    public function buildRequest() : ComplexType
    {
        $identifier = new Q1Identifier($this->messageId);

        $subjectProperty = new Q1SubjectProperty($this->titleNumber);
        $expectedPrice = new Q1ExpectedPrice();

        if ($this->grossPriceAmount) {
            $expectedPrice->setGrossPriceAmount($this->grossPriceAmount);
        }

        if ($this->netPriceAmount) {
            $expectedPrice->setNetPriceAmount($this->netPriceAmount);
        }

        if ($this->vatAmount) {
            $expectedPrice->setVATAmount($this->vatAmount);
        }

        $titleKnownOfficialCopy = new Q1TitleKnownOfficialCopy(
            $this->continueIfTitleIsClosedAndContinued,
            $this->notifyIfPendingFirstRegistration,
            $this->notifyIfPendingApplication,
            $this->sendBackDated,
            $this->continueIfActualFeeExceedsExpectedFee,
            $this->includeTitlePlan
        );

        $product = new Q1Product(
            $subjectProperty,
            $expectedPrice,
            $this->externalReference,
            $this->customerReference,
            $titleKnownOfficialCopy
        );

        return new RequestOCWithSummary(
            $identifier,
            $product
        );
    }
}
