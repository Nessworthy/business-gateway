<?php
namespace Nessworthy\BusinessGateway\Parts\Primitive;

/**
 * The base type to represent a string.
 * @package Nessworthy\BusinessGateway\Parts\Primitive
 */
class DateType extends BaseSimpleType
{

    public function __construct($date) {

        $dateTime = date_create_from_format('Y-m-d', $date); // Eh, lazy validation.

        return parent::__construct($dateTime->format('Y-m-d'));
    }
}