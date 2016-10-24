<?php declare(strict_types = 1);
namespace Isg\BusinessGateway\Builders;

use Isg\BusinessGateway\Parts\BusinessEntities\Q1CustomerReference;
use Isg\BusinessGateway\Parts\BusinessEntities\Q1ExpectedPrice;
use Isg\BusinessGateway\Parts\BusinessEntities\Q1ExternalReference;
use Isg\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Isg\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0\Q1Product;
use Isg\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0\Q1SubjectProperty;
use Isg\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0\Q1TitleKnownOfficialCopy;
use Isg\BusinessGateway\Parts\ComplexType;
use Isg\BusinessGateway\Parts\Content\Amount;
use Isg\BusinessGateway\Parts\Content\Indicator;
use Isg\BusinessGateway\Parts\Content\Q1Text;
use Isg\BusinessGateway\Parts\Content\Q2Text;
use Isg\BusinessGateway\Parts\Content\Q3Text;
use Isg\BusinessGateway\Parts\Content\ReferenceText;
use Isg\BusinessGateway\Parts\Documents\RequestOCWithSummary;
use Isg\BusinessGateway\System\Builder;

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

    /**
     * Indicate whether to continue with the new Title number without warning.
     * @param bool $indicator
     */
    public function setContinueIfTitleIsClosedAndContinued(bool $indicator)
    {
        $this->continueIfTitleIsClosedAndContinued = new Indicator($indicator);
    }

    /**
     * Indicate whether to continue where there is a pending new title application.
     * @param bool $indicator
     */
    public function setNotifyIfPendingFirstRegistration(bool $indicator)
    {
        $this->notifyIfPendingFirstRegistration = new Indicator($indicator);
    }

    /**
     * Indicate whether to continue where there is a pending application.
     * @param bool $indicator
     */
    public function setNotifyIfPendingApplication(bool $indicator)
    {
        $this->notifyIfPendingApplication = new Indicator($indicator);
    }

    /**
     * Indicate whether to issue back dated official copies.
     * @param bool $indicator
     */
    public function setSendBackDated(bool $indicator)
    {
        $this->sendBackDated = new Indicator($indicator);
    }

    /**
     * Indicate whether to continue if the fee calculated by the business gateway
     * is more than the fee expected to be paid by the customer.
     * @param bool $indicator
     */
    public function setContinueIfActualFeeExceedsExpectedFee(bool $indicator)
    {
        $this->continueIfActualFeeExceedsExpectedFee = new Indicator($indicator);
    }

    /**
     * Indicate whether the response should include an electronic title plan for
     * the property given.
     * @param bool $indicator
     */
    public function setIncludeTitlePlan(bool $indicator)
    {
        $this->includeTitlePlan = new Indicator($indicator);
    }

    /**
     * Set the unique ID for this request.
     * @param string $messageId
     */
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
