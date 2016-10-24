<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class Q4Text
 * @package Isg\BusinessGateway\Parts\Content
 */
class Q4Text extends StringType
{
    /**
     * Q4Text constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->validateMinLength($text, 1);
        $this->validateMaxLength($text, 25);
        $this->validateRegEx($text, '#^[A-Za-z0-9\s~!&quot;@#$%\'\(\)\*\+,\-\./:;=&gt;\?\[\\\]_\{\}\^&#xa3;&amp;]*$#');
        return parent::__construct($text);
    }
}
