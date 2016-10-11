<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\System;

/**
 * Interface EncryptedCert
 * Extended implementation of Cert, implies the certificate provided
 * also requires a pass phrase to decrypt and read.
 * @package Nessworthy\BusinessGateway\System
 */
interface EncryptedCert extends Cert
{
    /**
     * Fetch the pass phrase of this certificate.
     * @return null|string
     */
    public function getCertPassPhrase() : string;
}