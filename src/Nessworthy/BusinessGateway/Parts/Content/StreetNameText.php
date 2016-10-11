<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class StreetNameText
 * Holds a valid UK street name.
 * @package Nessworthy\BusinessGateway\Parts\Content
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