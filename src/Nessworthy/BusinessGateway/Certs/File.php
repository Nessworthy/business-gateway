<?php
namespace Nessworthy\BusinessGateway\Certs;

use Nessworthy\BusinessGateway\System\Cert;

class File implements Cert
{
    private $location;
    private $passphrase;

    public function __construct($location, $passphrase = null) {
        if(!file_exists($location)) {
            throw new \InvalidArgumentException('Could not locate the certificate file at ' . $location);
        }
        $this->location = $location;
        $this->passphrase = $passphrase;
    }

    public function getCertLocation()
    {
        return $this->location;
    }

    public function getCertPassPhrase()
    {
        return $this->passphrase;
    }


}