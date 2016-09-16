<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\Indicator;
use Nessworthy\BusinessGateway\Parts\Content\OfficialCopyCode;
use Nessworthy\BusinessGateway\Parts\Content\PropertyDescriptionText;
use Nessworthy\BusinessGateway\Parts\Content\RequestedOfficialCopyCode;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1TitleKnownOfficialCopy extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('RequestedOfficialCopyCode', 0, 1);
        $this->defineChild('PropertyDescription', 1, 1);
        $this->defineChild('OfficialCopyTypeCode', 1, 1);
        $this->defineChild('ContinueIfTitleIsClosedAndContinuedIndicator', 1, 1);
        $this->defineChild('NotifyIfPendingFirstRegistrationIndicator', 1, 1);
        $this->defineChild('NotifyIfPendingApplicationIndicator', 1, 1);
        $this->defineChild('SendBackDatedIndicator', 1, 1);
        $this->defineChild('ContinueIfActualFeeExceedsExpectedFeeIndicator', 1, 1);
        $this->defineChild('CertificateInFormCI', 0, 1);
    }

    public function __construct(
        PropertyDescriptionText $propertyDescription,
        OfficialCopyCode $officialCopyTypeCode,
        Indicator $continueIfTitleIsClosedAnyContinuedIndicator,
        Indicator $notifyIfPendingFirstRegistrationIndicator,
        Indicator $notifyIfPendingApplicationIndicator,
        Indicator $sendBackDatedIndicator,
        Indicator $continueIfActualFeeExceedsExpectedFeeIndicator
    )
    {
        parent::__construct();
        $this->addChild('PropertyDescription', $propertyDescription);
        $this->addChild('OfficialCopyTypeCode', $officialCopyTypeCode);
        $this->addChild('ContinueIfTitleIsClosedAndContinuedIndicator', $continueIfTitleIsClosedAnyContinuedIndicator);
        $this->addChild('NotifyIfPendingFirstRegistrationIndicator', $notifyIfPendingFirstRegistrationIndicator);
        $this->addChild('SendBackDatedIndicator', $sendBackDatedIndicator);
        $this->addChild('ContinueIfActualFeeExceedsExpectedFeeIndicator', $continueIfActualFeeExceedsExpectedFeeIndicator);
    }

    public function setRequestedOfficialCopyCode(RequestedOfficialCopyCode $requestedOfficialCopyCode)
    {
        $this->addChild('RequestedOfficialCopyCode', $requestedOfficialCopyCode);
    }

    public function setCertificateInFormCI(Q1CertificateInFormCI $certificateInFormCI)
    {
        $this->addChild('CertificateInFormCI', $certificateInFormCI);
    }

}