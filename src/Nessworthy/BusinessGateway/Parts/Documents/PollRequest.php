<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Documents;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\PollRequest\Q1Identifier;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class PollRequest
 * @package Nessworthy\BusinessGateway\Parts\Documents
 * @property Q1Identifier ID
 */
class PollRequest extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('ID', 1, 1);
    }

    /**
     * PollRequest constructor.
     * @param Q1Identifier $Id
     */
    public function __construct(Q1Identifier $Id)
    {
        parent::__construct();
        $this->addChild('ID', $Id);
    }
}
