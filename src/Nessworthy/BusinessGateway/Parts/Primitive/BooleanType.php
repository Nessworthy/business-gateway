<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Primitive;

/**
 * The base type to represent a boolean.
 * @package Nessworthy\BusinessGateway\Parts\Primitive
 */
class BooleanType extends BaseSimpleType
{
    /**
     * BooleanType constructor.
     * @param bool $bool
     */
    public function __construct(bool $bool)
    {
        return parent::__construct($bool);
    }
}
