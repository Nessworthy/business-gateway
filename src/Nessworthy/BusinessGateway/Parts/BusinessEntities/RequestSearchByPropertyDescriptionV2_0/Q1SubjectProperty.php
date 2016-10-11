<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1SubjectProperty
 * Used to hold information about the target property address.
 *
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property Q1Address Address
 */
class Q1SubjectProperty extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Address', 1, 1);
    }

    /**
     * Q1SubjectProperty constructor.
     * @param Q1Address $address
     */
    public function __construct(Q1Address $address)
    {
        parent::__construct();

        $this->addChild('Address', $address);
    }
}