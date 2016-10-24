<?php declare(strict_types=1);
namespace Isg\BusinessGateway\System;

/**
 * Interface Environment
 * An interface to expose an environment's details for the SDK.
 * @package Isg\BusinessGateway\System
 */
interface Environment
{
    /**
     * Fetch the environment URI.
     * @return string
     */
    public function getUri() : string;
}