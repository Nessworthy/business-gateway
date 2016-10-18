<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Responders\Soap;

use Nessworthy\BusinessGateway\Responders\EnquiryByPropertyDescription;

class SoapEnquiryByPropertyDescription extends SoapResult implements EnquiryByPropertyDescription
{
    public function getTitles(): array
    {
        $titles = [];

        $titleData = $this->getResult()->Title;
        if (!is_array($titleData)) {
            $titleData = [$titleData];
        }

        foreach ($titleData as $title) {
            $titles[] = [
                'title' => $title->TitleNumber->_,
                'description' => isset($title->Description) ? $title->Description->_ : null,
                'tenure' => $title->TenureInformation->TenureTypeCode->_,
                'address' => [
                    'building' => isset($title->Address->BuildingName) ? $title->Address->BuildingName->_ : null,
                    'sub_building' => isset($title->Address->SubBuildingName)
                        ? $title->Address->SubBuildingName->_
                        : null,
                    'building_number' => isset($title->Address->BuildingNumber)
                        ? $title->Address->BuildingNumber->_
                        : null,
                    'street' => isset($title->Address->StreetName) ? $title->Address->StreetName->_ : null,
                    'city' => isset($title->Address->CityName) ? $title->Address->CityName->_ : null,
                    'postcode' => $title->Address->PostcodeZone->Postcode->_,
                ],
            ];
        }

        return $titles;
    }
}
