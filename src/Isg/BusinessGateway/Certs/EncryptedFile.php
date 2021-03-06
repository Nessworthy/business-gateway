<?php
namespace Isg\BusinessGateway\Certs;

use Isg\BusinessGateway\System\EncryptedCert;

/**
 * Class EncryptedFile
 * Holds a certificate file path with accompanying pass phrase to decrypt it.
 * @package Isg\BusinessGateway\Certs
 */
class EncryptedFile extends File implements EncryptedCert
{
    private $passPhrase;

    /**
     * EncryptedFile constructor.
     * @param string $location
     * @param string $passPhrase
     */
    public function __construct(string $location, string $passPhrase)
    {
        $this->passPhrase = $passPhrase;
        parent::__construct($location);
    }

    /**
     * @inheritDoc
     */
    public function getCertPassPhrase() : string
    {
        return $this->passPhrase;
    }
}
