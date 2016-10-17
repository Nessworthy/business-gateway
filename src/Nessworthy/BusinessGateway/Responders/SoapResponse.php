<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Responders;

class SoapResponse implements Response
{
    const RESPONSE_OTHER = '0';
    const RESPONSE_SUCCESS = '30';
    const RESPONSE_REJECTION = '20';
    const RESPONSE_ACKNOWLEDGEMENT = '10';

    public function __construct(\stdClass $soapData)
    {
        $this->data = $soapData;
    }

    private function getResponseCode()
    {
        return $this->GatewayResponse->TypeCode->_;
    }

    public function isSuccessful() : bool
    {
        return $this->getResponseCode() === self::RESPONSE_SUCCESS;
    }

    public function isRejected() : bool
    {
        return $this->getResponseCode() === self::RESPONSE_REJECTION;
    }

    public function isAcknowledged() : bool
    {
        return $this->getResponseCode() === self::RESPONSE_ACKNOWLEDGEMENT;
    }

    public function isOther() : bool
    {
        return $this->getResponseCode() === self::OTHER;
    }

}