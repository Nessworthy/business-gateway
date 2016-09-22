<?php
namespace Nessworthy\BusinessGateway\Builders;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1CustomerReference;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0\Q1Address;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0\Q1ExternalReference;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0\Q1Product;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0\Q1SubjectProperty;
use Nessworthy\BusinessGateway\Parts\Content\BuildingNameText;
use Nessworthy\BusinessGateway\Parts\Content\BuildingNumberText;
use Nessworthy\BusinessGateway\Parts\Content\CityText;
use Nessworthy\BusinessGateway\Parts\Content\PostcodeText;
use Nessworthy\BusinessGateway\Parts\Content\Q1Text;
use Nessworthy\BusinessGateway\Parts\Content\ReferenceText;
use Nessworthy\BusinessGateway\Parts\Content\StreetNameText;
use Nessworthy\BusinessGateway\Parts\Content\Text;
use Nessworthy\BusinessGateway\Parts\Documents\RequestSearchByPropertyDescriptionV2_0;
use Nessworthy\BusinessGateway\System\Builder;

class EnquiryByPropertyDescription implements Builder
{
    private $messageId;
    private $externalReference;
    private $customerReference;
    private $address;
    private $request;

    public function setMessageId($messageId)
    {
        $this->messageId = new Q1Identifier(new Q1Text($messageId));
    }

    public function setExternalReference($reference, $allocatedBy = null, $description = null)
    {
        $externalReference = new Q1ExternalReference(new ReferenceText($reference));

        if($allocatedBy) {
            $externalReference->setAllocatedBy(new Text($allocatedBy));
        }
        if($description) {
            $externalReference->setDescription(new Text($description));
        }

        $this->externalReference = $externalReference;
    }

    public function setCustomerReference($reference, $allocatedBy = null, $description = null)
    {
        $customerReference = new Q1CustomerReference(new ReferenceText($reference));

        if($allocatedBy) {
            $customerReference->setAllocatedBy(new Text($allocatedBy));
        }
        if($description) {
            $customerReference->setDescription(new Text($description));
        }

        $this->customerReference = $customerReference;
    }

    public function setAddress(
        $buildingName = null,
        $buildingNumber = null,
        $streetName = null,
        $cityName = null,
        $postcodeZone = null
    ) {
        $address = new Q1Address();
        if($buildingName) {
            $address->setBuildingName(new BuildingNameText($buildingName));
        }
        if($buildingNumber)
        {
            $address->setBuildingNumber(new BuildingNumberText($buildingNumber));
        }
        if($streetName)
        {
            $address->setStreetName(new StreetNameText($streetName));
        }
        if($cityName) {
            $address->setCityName(new CityText($cityName));
        }
        if($postcodeZone) {
            $address->setPostcodeZone(new PostcodeText($postcodeZone));
        }
        $this->address = $address;
    }

    public function buildRequest()
    {
        if(!is_null($this->request)) {
            return $this->request;
        }
        $subjectProperty = new Q1SubjectProperty($this->address);
        $product = new Q1Product($this->externalReference, $this->customerReference, $subjectProperty);

        $request = new RequestSearchByPropertyDescriptionV2_0($this->messageId, $product);
        $this->request = $request;
        return $request;
    }

}