<?php

namespace Nessworthy\BusinessGateway\Parts\Restrictions;

interface Enumeration
{
    /**
     * Return the list of values that this type can be equal to.
     * TODO: Should this be static instead?
     * @return mixed[]
     */
    function getEnumerableChoices();
}