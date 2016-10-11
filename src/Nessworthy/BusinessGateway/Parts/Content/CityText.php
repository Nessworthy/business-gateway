<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class CityText
 * Holds a city name.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class CityText extends StringType
{
    /**
     * CityText constructor.
     * @param string $city
     */
    public function __construct(string $city)
    {
        $this->validateMinLength($city, 1);
        $this->validateMaxLength($city, 35);
        $this->validateRegEx($city, '#^.*\S.*$#');
        return parent::__construct($city);
    }
}