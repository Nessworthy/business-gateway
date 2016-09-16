<?php
namespace Nessworthy\BusinessGateway\Parts\Primitive;

class DateTimeType extends BaseSimpleType
{
    public function __construct($date) {

        $dateTime = new \DateTimeImmutable($date); // Eh, lazy validation.

        return parent::__construct($dateTime->format('c'));
    }
}