<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class StreetNameText
 * Holds a valid UK street name.
 * @package Isg\BusinessGateway\Parts\Content
 */
class StreetNameText extends StringType
{
    /**
     * StreetNameText constructor.
     * @param string $streetName
     */
    public function __construct(string $streetName)
    {
        $this->validateMinLength($streetName, 1);
        $this->validateMaxLength($streetName, 80);
        $this->validateRegEx($streetName, '#^.*\S.*$#');
        return parent::__construct($streetName);
    }
}
