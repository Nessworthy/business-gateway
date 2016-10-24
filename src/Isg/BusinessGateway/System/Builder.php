<?php declare(strict_types=1);
namespace Isg\BusinessGateway\System;
use Isg\BusinessGateway\Parts\ComplexType;

/**
 * Interface Builder
 * Represents a request builder.
 * @package Isg\BusinessGateway\System
 */
interface Builder
{
    /**
     * Build a request.
     * @return ComplexType The fully built request, represented as a nested collection of objects.
     */
    public function buildRequest();
}
