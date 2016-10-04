<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\Q3Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Communication
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property Q3Text Telephone
 */
class Q1Communication extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Telephone', 1, 1);
    }

    /**
     * @param Q3Text $telephone
     */
    public function setTelephone(Q3Text $telephone)
    {
        $this->addChild('Telephone', $telephone);
    }

}