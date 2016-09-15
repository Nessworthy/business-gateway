<?php
namespace Nessworthy\BusinessGateway\Parts;

interface Type
{
    /**
     * Verify data contained within this type is valid.
     * @throws ValidationRestrictionException
     * @return true
     */
    public function sanityCheck();
}