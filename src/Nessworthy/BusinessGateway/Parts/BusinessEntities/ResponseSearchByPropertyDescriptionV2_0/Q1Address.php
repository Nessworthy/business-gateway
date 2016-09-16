<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities\ResponseSearchByPropertyDescriptionV2_0;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1PostcodeZone;
use Nessworthy\BusinessGateway\Parts\Content\BuildingNameText;
use Nessworthy\BusinessGateway\Parts\Content\BuildingNumberText;
use Nessworthy\BusinessGateway\Parts\Content\CityText;
use Nessworthy\BusinessGateway\Parts\Content\PostcodeText;
use Nessworthy\BusinessGateway\Parts\Content\StreetNameText;
use Nessworthy\BusinessGateway\Parts\Content\Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1Address
 * Holds a full UK address. Not all fields are required.
 * A building number and postcode are recommended.
 *
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
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
        $this->defineChild('SubBuildingName', 0, 1);
        $this->defineChild('BuildingNumber', 0, 1);
        $this->defineChild('StreetName', 0, 1);
        $this->defineChild('CityName', 0, 1);
        $this->defineChild('PostcodeZone', 1, 1);
    }

    public function __construct(Q1PostcodeZone $postcodeZone)
    {
        parent::__construct();
        $this->addChild('PostcodeZone', $postcodeZone);
    }

    /**
     * Add a building name.
     * @param Text $buildingName
     */
    public function setBuildingName(Text $buildingName)
    {
        $this->addChild('BuildingName', $buildingName);
    }

    /**
     * Add a building name.
     * @param Text $buildingName
     */
    public function setSubBuildingName(Text $buildingName)
    {
        $this->addChild('BuildingName', $buildingName);
    }

    /**
     * Add a building number.
     * @param Text $buildingNumber
     */
    public function setBuildingNumber(Text $buildingNumber)
    {
        $this->addChild('BuildingNumber', $buildingNumber);
    }

    /**
     * Add a street name.
     * @param Text $streetName
     */
    public function setStreetName(Text $streetName)
    {
        $this->addChild('StreetName', $streetName);
    }

    /**
     * Add a city name.
     * @param Text $cityName
     */
    public function setCityName(Text $cityName)
    {
        $this->addChild('CityName', $cityName);
    }

    /**
     * Add a postcode.
     * @param Q1PostcodeZone $postcodeZone
     */
    public function setPostcodeZone(Q1PostcodeZone $postcodeZone)
    {
        $this->addChild('PostcodeZone', $postcodeZone);
    }
}