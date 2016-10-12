<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0;

use Nessworthy\BusinessGateway\Parts\Content\Indicator;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1TitleKnownOfficialCopy
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0
 * @property Indicator ContinueIfTitleIsClosedAndContinuedIndicator
 * @property Indicator NotifyIfPendingFirstRegistrationIndicator
 * @property Indicator NotifyIfPendingApplicationIndicator
 * @property Indicator SendBackDatedIndicator
 * @property Indicator ContinueIfActualFeeExceedsExpectedFeeIndicator
 * @property Indicator IncludeTitlePlanIndicator
 */
class Q1TitleKnownOfficialCopy extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('ContinueIfTitleIsClosedAndContinuedIndicator', 1, 1);
        $this->defineChild('NotifyIfPendingFirstRegistrationIndicator', 1, 1);
        $this->defineChild('NotifyIfPendingApplicationIndicator', 1, 1);
        $this->defineChild('SendBackDatedIndicator', 1, 1);
        $this->defineChild('ContinueIfActualFeeExceedsExpectedFeeIndicator', 1, 1);
        $this->defineChild('IncludeTitlePlanIndicator', 1, 1);
    }

    public function __construct(
        Indicator $continueIfTitleIsClosedAndContinuedIndicator,
        Indicator $notifyIfPendingFirstRegistrationIndicator,
        Indicator $notifyIfPendingApplicationIndicator,
        Indicator $sendBackDatedIndicator,
        Indicator $continueIfActualFeeExceedsExpectedFeeIndicator,
        Indicator $includeTitlePlanIndicator
    )
    {
        parent::__construct();
        $this->addChild('ContinueIfTitleIsClosedAndContinuedIndicator', $continueIfTitleIsClosedAndContinuedIndicator);
        $this->addChild('NotifyIfPendingFirstRegistrationIndicator', $notifyIfPendingFirstRegistrationIndicator);
        $this->addChild('NotifyIfPendingApplicationIndicator', $notifyIfPendingApplicationIndicator);
        $this->addChild('SendBackDatedIndicator', $sendBackDatedIndicator);
        $this->addChild('ContinueIfActualFeeExceedsExpectedFeeIndicator', $continueIfActualFeeExceedsExpectedFeeIndicator);
        $this->addChild('IncludeTitlePlanIndicator', $includeTitlePlanIndicator);
    }

}