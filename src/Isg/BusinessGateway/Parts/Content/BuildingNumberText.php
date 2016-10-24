<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class BuildingNumberText
 * Holds a building number.
 * @package Isg\BusinessGateway\Parts\Content
 */
class BuildingNumberText extends StringType
{
    /**
     * BuildingNumberText constructor.
     * @param string $buildingNumber
     */
    public function __construct(string $buildingNumber)
    {
        $this->validateMinLength($buildingNumber, 1);
        $this->validateMaxLength($buildingNumber, 5);
        $this->validateRegEx($buildingNumber, '#^.*\S.*$#');
        return parent::__construct($buildingNumber);
    }
}
