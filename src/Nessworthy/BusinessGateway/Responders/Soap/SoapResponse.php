<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Responders\Soap;

use Nessworthy\BusinessGateway\Responders\Response;

class SoapResponse implements Response
{
    const RESPONSE_OTHER = '0';
    const RESPONSE_SUCCESS = '30';
    const RESPONSE_REJECTION = '20';
    const RESPONSE_ACKNOWLEDGEMENT = '10';

    private $data;
    private $responseCode;

    public function __construct(\stdClass $soapData)
    {
        $this->data = $soapData;
    }

    private function getResponseCode() : string
    {
        if (!$this->responseCode) {
            $this->responseCode = $this->data->return->GatewayResponse->TypeCode->_;
        }

        return $this->responseCode;
    }

    protected function getData() : \stdClass
    {
        return $this->data;
    }

    protected function getResponseRejectionData() : \stdClass
    {
        return $this->getResponseData()->Rejection;
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
        return $this->getResponseCode() === self::RESPONSE_OTHER;
    }

    public function getRejectionData()
    {
        return $this->getData()->return->GatewayResponse->Rejection;
    }

    public function getAcknowledgementData()
    {
        return $this->getData()->return->GatewayResponse->Acknowledgement;
    }

    public function getResultData()
    {
        return $this->getData()->return->GatewayResponse->Results;
    }


}
