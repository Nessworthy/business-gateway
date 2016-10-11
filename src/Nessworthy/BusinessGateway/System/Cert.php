<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\System;

/**
 * Interface Cert
 * Holds a pointer to a secure certificate or certificate bundle location.
 * @package Nessworthy\BusinessGateway\System
 */
interface Cert
{
    /**
     * Fetch the location of this certificate.
     * @return string
     */
    public function getCertLocation() : string;
}