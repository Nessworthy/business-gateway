<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;

/**
 * Class Q2Text
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class Q2Text extends StringType implements MaxLength, MinLength, Pattern
{
    /**
     * @inheritDoc
     */
    function getMinLength()
    {
        return 1;
    }

    /**
     * @inheritDoc
     */
    public function getMaxLength()
    {
        return 9;
    }

    /**
     * @inheritDoc
     */
    public function getPattern()
    {
        return '#^[A-Z]{0,3}[0-9]{1,6}[ZT]?$#';
    }
}