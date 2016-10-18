<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Responders;

interface Result
{
    public function getExternalReference() : string;
    public function getMessageDetails() : string;
    public function hasMessageDetails() : bool;
}
