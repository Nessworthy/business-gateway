<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class CityText
 * Holds a city name.
 * @package Isg\BusinessGateway\Parts\Content
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
