<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;

/**
 * Class PostcodeText
 * Holds a valid UK postcode.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class PostcodeText extends StringType implements MaxLength, MinLength, Pattern
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
        return 8;
    }

    /**
     * @inheritDoc
     */
    public function getPattern()
    {
        return '#^[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][A-Z-[CIKMOV]]{2}$#';
    }
}