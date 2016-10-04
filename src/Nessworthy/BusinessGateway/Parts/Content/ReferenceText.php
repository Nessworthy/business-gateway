<?php
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;

/**
 * Class ReferenceText
 * Holds a reference identifier.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class ReferenceText extends StringType implements MaxLength, MinLength, Pattern
{
    /**
     * @inheritDoc
     */
    public function getMinLength()
    {
        return 1;
    }

    /**
     * @inheritDoc
     */
    public function getMaxLength()
    {
        return 25;
    }

    /**
     * @inheritDoc
     */
    public function getPattern()
    {
        return '#^[A-Za-z0-9\s~!"@\#$%\'\(\)\*\+,\-\./:;=\?\[\\\\\]_\{\}\^£&]*$#';
    }
}