<?php
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
    public function get_();

    /**
     * Return the data for this type.
     * @see SimpleType::get_()
     * @return mixed
     */
    public function __toString();
}