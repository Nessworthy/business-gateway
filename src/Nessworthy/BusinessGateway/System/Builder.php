<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\System;
use Nessworthy\BusinessGateway\Parts\ComplexType;

/**
 * Interface Builder
 * Represents a request builder.
 * @package Nessworthy\BusinessGateway\System
 */
interface Builder
{
    /**
     * Build a request.
     * @return ComplexType The fully built request, represented as a nested collection of objects.
     */
    public function buildRequest();
}
