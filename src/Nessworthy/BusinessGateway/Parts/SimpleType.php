<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts;
/**
 * Interface SimpleType
 * Represents a simple primitive type with no children.
 */
interface SimpleType extends Type
{
    /**
     * Return the data for this type.
     * @return mixed
     */
    public function __toString();

    /**
     * Return the data for this type.
     * Should only support '_' as a key.
     * @param string $key The key to request.
     * @return mixed
     */
    public function __get($key);
}