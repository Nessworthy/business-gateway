<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\ProductResponseCode;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

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

    public function __construct(ProductResponseCode $typeCode)
    {
        parent::__construct();
        $this->addChild('TypeCode', $typeCode);
    }

    public function setAcknowledgement(Q1Acknowledgement $acknowledgement)
    {
        $this->addChild('Acknowledgement', $acknowledgement);
    }

    public function setRejection()
    {

    }

}