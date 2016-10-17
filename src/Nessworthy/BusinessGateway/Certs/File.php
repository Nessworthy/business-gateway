<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Certs;

use Nessworthy\BusinessGateway\System\Cert;

/**
 * Class File
 * Holds a valid path to a secure certificate or certificate bundle.
 * For encrypted files, use EncryptedFile instead.
 * @package Nessworthy\BusinessGateway\Certs
 */
class File implements Cert
{
    private $location;

    /**
     * File constructor.
     * @param string $location
     */
    public function __construct(string $location)
    {
        if (!file_exists($location)) {
            throw new \InvalidArgumentException('Could not locate the certificate file at ' . $location);
        }
        $this->location = $location;
    }

    /**
     * @inheritDoc
     */
    public function getCertLocation() : string
    {
        return $this->location;
    }
}
