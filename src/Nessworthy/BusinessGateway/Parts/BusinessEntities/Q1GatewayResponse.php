<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\ProductResponseCode;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1GatewayResponse
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property ProductResponseCode TypeCode
 * @property null|Q1Acknowledgement Acknowledgement
 * @property null|Q1Rejection Rejection
 * @property null|Q1Results Results
 */
class Q1GatewayResponse extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('TypeCode', 1, 1);
        $this->defineChild('Acknowledgement', 0, 1);
        $this->defineChild('Rejection', 0, 1);
        $this->defineChild('Results', 0, 1);
    }

    /**
     * Q1GatewayResponse constructor.
     * @param ProductResponseCode $typeCode
     */
    public function __construct(ProductResponseCode $typeCode)
    {
        parent::__construct();
        $this->addChild('TypeCode', $typeCode);
    }

    public function setAcknowledgement(Q1Acknowledgement $acknowledgement)
    {
        $this->addChild('Acknowledgement', $acknowledgement);
    }

    public function setRejection(Q1Rejection $rejection)
    {
        $this->addChild('Rejection', $rejection);
    }

    public function setResults(Q1Results $results)
    {
        $this->addChild('Results', $results);
    }

}