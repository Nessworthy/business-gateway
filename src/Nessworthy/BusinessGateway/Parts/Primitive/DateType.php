<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Primitive;

/**
 * The base type to represent a string.
 * @package Nessworthy\BusinessGateway\Parts\Primitive
 */
class DateType extends BaseSimpleType
{

    public function __construct($date) {

        $dateTime = date_create_from_format('Y-m-d', $date); // Eh, lazy validation.
        if(!$dateTime) {
            throw new \InvalidArgumentException('DateType constructor expects a valid date in the format YYYY-MM-DD.');
        }

        return parent::__construct($dateTime->format('Y-m-d'));
    }
}