<?php
namespace Nessworthy\BusinessGateway\Parts\Primitive;

class DateTimeType extends BaseSimpleType
{
    /**
     * DateTimeType constructor.
     * See PHP's DateTime constructor for acceptable arguments.
     * @param string $date Accepts a standard date time.
     * @throws \Exception
     */
    public function __construct($date) {

        $dateTime = new \DateTimeImmutable($date); // Eh, lazy validation.

        return parent::__construct($dateTime->format('c'));
    }
}