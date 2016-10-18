<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Responders;

interface Acknowledgement
{
    public function getUniqueId() : string;

    public function getExpectedResponseDateTime() : \DateTimeImmutable;

    public function getDescription() : string;
}
