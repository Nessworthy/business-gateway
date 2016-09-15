<?php

namespace Nessworthy\BusinessGateway\Parts\Restrictions;

interface MinLength
{
    /**
     * Return the required minimum length of this type.
     * @return int A positive integer.
     */
    function getMinLength();
}