<?php declare(strict_types=1);
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
    public function __construct(Q3Text $telephone)
    {
        parent::__construct();
        $this->addChild('Telephone', $telephone);
    }

    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('Telephone', 1, 1);
    }
}
