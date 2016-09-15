<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;

/**
 * Class Q4Text
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class Q4Text extends StringType implements MinLength, MaxLength, Pattern
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
    function getMaxLength()
    {
        return 25;
    }

    /**
     * @inheritDoc
     */
    public function getPattern()
    {
        return '#^[A-Za-z0-9\s~!&quot;@#$%\'\(\)\*\+,\-\./:;=&gt;\?\[\\\]_\{\}\^&#xa3;&amp;]*$#';
    }
}