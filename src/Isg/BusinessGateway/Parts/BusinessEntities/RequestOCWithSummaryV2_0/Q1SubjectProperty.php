<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0;

use Isg\BusinessGateway\Parts\Content\Q2Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1SubjectProperty
 * @package Isg\BusinessGateway\Parts\BusinessEntities\RequestOCWithSummaryV2_0
 * @property Q2Text TitleNumber
 */
class Q1SubjectProperty extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('TitleNumber', 1, 1);
    }

    /**
     * Q1SubjectProperty constructor.
     * @param Q2Text $titleNumber
     */
    public function __construct(Q2Text $titleNumber)
    {
        parent::__construct();
        $this->addChild('TitleNumber', $titleNumber);
    }
}
