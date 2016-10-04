<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;

/**
 * Class Q3Text
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class Q3Text extends StringType implements Pattern
{
    /**
     * @inheritDoc
     */
    public function getPattern()
    {
        return '#^.*\S.*$#';
    }
}