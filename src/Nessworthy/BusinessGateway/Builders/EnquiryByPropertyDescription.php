<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Builders;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0\Q1CustomerReference;
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
use Nessworthy\BusinessGateway\Parts\Documents\RequestSearchByPropertyDescription;
use Nessworthy\BusinessGateway\System\Builder;

/**
 * Class EnquiryByPropertyDescription
 * Build an enquiry by property description request for the land registry API.
 * Used to get a property's title ID for further API requests.
 * @package Nessworthy\BusinessGateway\Builders
 */
class EnquiryByPropertyDescription implements Builder
{
    private $messageId;
    private $externalReference;
    private $customerReference;
    private $address;
    private $request;

    /**
     * Set a unique message ID for this request.
     * This is used to refer to a specific request for debugging, and needed for using the polling service.
     * @param string $messageId A unique alphanumeric message ID between 5 and 50 characters; dashes are allowed.
     */
    public function setMessageId(string $messageId)
    {
        $this->messageId = new Q1Identifier(new Q1Text($messageId));
    }

    /**
     * Set an external reference ID for this request.
     * This reference number should be your own system's reference ID for this request.
     * @param string $reference A unique reference identifier, between 1 and 25 characters.
     * @param null|string $allocatedBy Currently unused. Who this reference was allocated by.
     * @param null|string $description Currently unused. An optional description about this reference.
     */
    public function setExternalReference(string $reference, string $allocatedBy = null, string $description = null)
    {
        $externalReference = new Q1ExternalReference(new ReferenceText($reference));

        if (is_string($allocatedBy)) {
            $externalReference->setAllocatedBy(new Text($allocatedBy));
        }
        if (is_string($description)) {
            $externalReference->setDescription(new Text($description));
        }

        $this->externalReference = $externalReference;
    }

    /**
     * Set an external customer reference ID for this request.
     * This reference number should be your own system's reference to identify the customer in this request.
     * @param string $reference A unique reference identifier, between 1 and 25 characters.
     * @param null|string $allocatedBy Currently unused. Who this reference was allocated by.
     * @param null|string $description Currently unused. An optional description about this reference.
     */
    public function setCustomerReference(string $reference, string $allocatedBy = null, string $description = null)
    {
        $customerReference = new Q1CustomerReference(new ReferenceText($reference));

        if (is_string($allocatedBy)) {
            $customerReference->setAllocatedBy(new Text($allocatedBy));
        }
        if (is_string($description)) {
            $customerReference->setDescription(new Text($description));
        }

        $this->customerReference = $customerReference;
    }

    /**
     * Set the address to be searched for in this request.
     * Usually a postcode and building number should be acceptable for most search requests.
     * Building Name: If the building has both a name and number, just use the number unless the number also
     * contains alpha characters (e.g. 70B Courtyard Apartments)
     * If the number contains one trailing alpha, just use the number and pick the correct address from the results.
     * Wild-carding is supported using '*' at the end of the building name, though this may return a lot more results
     * than necessary.
     * It's not possible to search by sub-building name, e.g. Ground Floor Flat
     * @param null|string $buildingName The name/number of a building or house. See the description for more info.
     * @param null|string $buildingNumber The building number. Prefixes such as "Flat" should be dropped.
     * @param null|string $streetName The street this property is located on. Supports wild-carding by using '*'
     * @param null|string $cityName The city name this property is located in. Locality should not be used here.
     * @param null|string $postcodeZone The postcode of the property. Partial postcodes are not accepted.
     */
    public function setAddress(
        string $buildingName = null,
        string $buildingNumber = null,
        string $streetName = null,
        string $cityName = null,
        string $postcodeZone = null
    ) {
        $address = new Q1Address();
        if ($buildingName) {
            $address->setBuildingName(new BuildingNameText($buildingName));
        }
        if ($buildingNumber) {
            $address->setBuildingNumber(new BuildingNumberText($buildingNumber));
        }
        if ($streetName) {
            $address->setStreetName(new StreetNameText($streetName));
        }
        if ($cityName) {
            $address->setCityName(new CityText($cityName));
        }
        if ($postcodeZone) {
            $address->setPostcodeZone(new PostcodeText($postcodeZone));
        }
        $this->address = $address;
    }

    /**
     * Build the request and return the built request data value object.
     * @return RequestSearchByPropertyDescription
     */
    public function buildRequest() : RequestSearchByPropertyDescription
    {
        if (!is_null($this->request)) {
            return $this->request;
        }
        $subjectProperty = new Q1SubjectProperty($this->address);
        $product = new Q1Product($this->externalReference, $this->customerReference, $subjectProperty);

        $request = new RequestSearchByPropertyDescription($this->messageId, $product);
        $this->request = $request;
        return $request;
    }
}
