<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts;

/**
 * Interface ComplexType
 * Complex types contain children.
 * It is up to the implementer to ensure that these children can be accessed
 * using __get and a getChild method.
 * @package Nessworthy\BusinessGateway\Parts
 */
interface ComplexType extends Type
{
    /**
     * Request the child or children or this complex type.
     * Returns a single simple/complex element, an array if it allows multiple children, or null if none were set.
     *
     * @throws InvalidChildException Thrown if the child key is not implemented.
     * @throws \InvalidArgumentException Thrown if the child key supplied is not a string.
     * @param string $childKey
     * @return SimpleType|ComplexType|array|null
     */
    public function __get($childKey);
}
