<?php

namespace Nessworthy\BusinessGateway\Parts\Restrictions;

interface MaxLength
{
    /**
     * Return the required minimum length of this type.
     * @return int A positive integer.
     */
    function getMaxLength();
}