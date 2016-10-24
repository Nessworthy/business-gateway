<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Primitive;

/**
 * The base type to represent a boolean.
 * @package Isg\BusinessGateway\Parts\Primitive
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
