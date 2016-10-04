<?php
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;

/**
 * Class PropertyDescriptionText
 * Holds a property description.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class PropertyDescriptionText extends StringType implements MaxLength, MinLength, Pattern
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
        return 130;
    }

    /**
     * @inheritDoc
     */
    public function getPattern()
    {
        return '#^.*\S.*$#';
    }
}