<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;

/**
 * Class MessageIDText
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class MessageIDText extends StringType implements MinLength, MaxLength, Pattern
{
    /**
     * @inheritDoc
     */
    function getMaxLength()
    {
        return 50;
    }

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
    function getPattern()
    {
        return '#^[a-zA-Z0-9][a-zA-Z0-9\-]*$#';
    }

}