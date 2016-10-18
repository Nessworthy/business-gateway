<?php declare(strict_types = 1);
namespace Nessworthy\BusinessGateway\Responders\Soap;

use Nessworthy\BusinessGateway\Responders\Acknowledgement;

class SoapAcknowledgement implements Acknowledgement
{
    private $acknowledgement;

    public function __construct(\stdClass $acknowledgement)
    {
        $this->acknowledgement = $acknowledgement->AcknowledgementDetails;
    }

    public function getUniqueId() : string
    {
        return $this->acknowledgement->UniqueID->_;
    }

    public function getExpectedResponseDateTime() : \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->acknowledgement->ExpectedResponseDateTime->_);
    }

    public function getDescription() : string
    {
        return $this->acknowledgement->MessageDescription->_;
    }
}
