<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0;

use Isg\BusinessGateway\Parts\Content\BuildingNameText;
use Isg\BusinessGateway\Parts\Content\BuildingNumberText;
use Isg\BusinessGateway\Parts\Content\CityText;
use Isg\BusinessGateway\Parts\Content\PostcodeText;
use Isg\BusinessGateway\Parts\Content\StreetNameText;
use Isg\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Address
 * Holds a full UK address. Not all fields are required.
 * A building number and postcode are recommended.
 *
 * @package Isg\BusinessGateway\Parts\BusinessEntities
 * @property BuildingNameText|null BuildingName
 * @property BuildingNumberText|null BuildingNumber
 * @property StreetNameText|null StreetName
 * @property CityText|null CityName
 * @property PostcodeText|null PostcodeZone
 */
class Q1Address extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('BuildingName', 0, 1);
        $this->defineChild('BuildingNumber', 0, 1);
        $this->defineChild('StreetName', 0, 1);
        $this->defineChild('CityName', 0, 1);
        $this->defineChild('PostcodeZone', 0, 1);
    }

    /**
     * Add a building name.
     * @param BuildingNameText $buildingName
     */
    public function setBuildingName(BuildingNameText $buildingName)
    {
        $this->addChild('BuildingName', $buildingName);
    }

    /**
     * Add a building number.
     * @param BuildingNumberText $buildingNumber
     */
    public function setBuildingNumber(BuildingNumberText $buildingNumber)
    {
        $this->addChild('BuildingNumber', $buildingNumber);
    }

    /**
     * Add a street name.
     * @param StreetNameText $streetName
     */
    public function setStreetName(StreetNameText $streetName)
    {
        $this->addChild('StreetName', $streetName);
    }

    /**
     * Add a city name.
     * @param CityText $cityName
     */
    public function setCityName(CityText $cityName)
    {
        $this->addChild('CityName', $cityName);
    }

    /**
     * Add a postcode.
     * @param PostcodeText $postcodeZone
     */
    public function setPostcodeZone(PostcodeText $postcodeZone)
    {
        $this->addChild('PostcodeZone', $postcodeZone);
    }
}
