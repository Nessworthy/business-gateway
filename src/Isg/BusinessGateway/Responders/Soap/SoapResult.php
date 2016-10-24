<?php declare(strict_types=1);

namespace Isg\BusinessGateway\Responders\Soap;

use Isg\BusinessGateway\Responders\Result;

class SoapResult implements Result
{
    private $result;

    public function __construct(\stdClass $result)
    {
        $this->result = $result;
    }

    public function getExternalReference() : string
    {
        return $this->result->ExternalReference->Reference->_;
    }

    public function getMessageDetails() : string
    {
        return $this->result->MessageDetails->_;
    }

    public function hasMessageDetails() : bool
    {
        return isset($this->result->MessageDetails);
    }

    protected function getResult() : \stdClass
    {
        return $this->result;
    }
}
