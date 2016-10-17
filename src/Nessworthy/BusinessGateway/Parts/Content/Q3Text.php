<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class Q3Text
 * @package Nessworthy\BusinessGateway\Parts\Content
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
