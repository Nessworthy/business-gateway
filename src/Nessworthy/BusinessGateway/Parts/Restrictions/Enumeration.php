<?php

namespace Nessworthy\BusinessGateway\Parts\Restrictions;

interface Enumeration
{
    /**
     * Return the list of values that this type can be equal to.
     * @return mixed[]
     */
    function getEnumerableChoices();
}