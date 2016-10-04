<?php

namespace Nessworthy\BusinessGateway\Parts\Restrictions;

interface Pattern
{
    /**
     * Return the regex pattern this data must match.
     * @return string A regular expression.
     */
    function getPattern();
}