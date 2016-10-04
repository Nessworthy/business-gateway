<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;

/**
 * Class Q1Text
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class Q1Text extends StringType implements MaxLength, MinLength, Pattern
{
    /**
     * @inheritDoc
     */
    function getMinLength()
    {
        return 5;
    }

    /**
     * @inheritDoc
     */
    public function getMaxLength()
    {
        return 50;
    }

    /**
     * @inheritDoc
     */
    public function getPattern()
    {
        return '#^[a-zA-Z0-9][a-zA-Z0-9\-]*$#';
    }
}