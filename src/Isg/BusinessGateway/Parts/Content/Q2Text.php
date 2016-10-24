<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class Q2Text
 * @package Isg\BusinessGateway\Parts\Content
 */
class Q2Text extends StringType
{
    /**
     * Q2Text constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->validateMinLength($text, 1);
        $this->validateMaxLength($text, 9);
        $this->validateRegEx($text, '#^[A-Z]{0,3}[0-9]{1,6}[ZT]?$#');
        return parent::__construct($text);
    }
}
