<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class Q3Text
 * @package Isg\BusinessGateway\Parts\Content
 */
class Q3Text extends StringType
{
    /**
     * Q3Text constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->validateRegEx($text, '#^.*\S.*$#');
        return parent::__construct($text);
    }
}
