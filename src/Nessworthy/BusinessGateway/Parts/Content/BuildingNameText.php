<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class BuildingNameText
 * Holds a building name.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class BuildingNameText extends StringType
{
    /**
     * BuildingNameText constructor.
     * @param string $buildingName
     */
    public function __construct(string $buildingName)
    {
        $this->validateMinLength($buildingName, 1);
        $this->validateMaxLength($buildingName, 50);
        $this->validateRegEx($buildingName, '#^.*\S.*$#');
        return parent::__construct($buildingName);
    }
}