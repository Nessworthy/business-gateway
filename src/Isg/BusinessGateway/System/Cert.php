<?php declare(strict_types=1);
namespace Isg\BusinessGateway\System;

/**
 * Interface Cert
 * Holds a pointer to a secure certificate or certificate bundle location.
 * @package Isg\BusinessGateway\System
 */
interface Cert
{
    /**
     * Fetch the location of this certificate.
     * @return string
     */
    public function getCertLocation() : string;
}