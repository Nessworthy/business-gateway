<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities;

use Isg\BusinessGateway\Parts\Content\Q3Text;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1DXDetailsType
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property Q3Text DXNumber
 * @property Q3Text ExchangeName
 */
class Q1DXDetails extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('DXNumber', 1, 1);
        $this->defineChild('ExchangeName', 1, 1);
    }

    /**
     * Q1DXDetailsType constructor.
     * @param Q3Text $dxNumber
     * @param Q3Text $exchangeName
     */
    public function __construct(Q3Text $dxNumber, Q3Text $exchangeName)
    {
        parent::__construct();
        $this->addChild('DXNumber', $dxNumber);
        $this->addChild('ExchangeName', $exchangeName);
    }
}
