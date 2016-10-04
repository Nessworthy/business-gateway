<?php
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;

/**
 * Class BuildingNumberText
 * Holds a building number.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class BuildingNumberText extends StringType implements MaxLength, MinLength, Pattern
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
        return 5;
    }

    /**
     * @inheritDoc
     */
    public function getPattern()
    {
        return '#^.*\S.*$#';
    }
}