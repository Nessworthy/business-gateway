<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class Q1Text
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class Q1Text extends StringType
{
    /**
     * Q1Text constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->validateMinLength($text, 5);
        $this->validateMaxLength($text, 50);
        $this->validateRegEx($text,'#^[a-zA-Z0-9][a-zA-Z0-9\-]*$#');
        return parent::__construct($text);
    }
}