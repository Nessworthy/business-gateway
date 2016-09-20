<?php
namespace Nessworthy\BusinessGateway;

use Nessworthy\BusinessGateway\System\Cert;
use Nessworthy\BusinessGateway\System\Credentials;
use Nessworthy\BusinessGateway\System\Environment;
use Nessworthy\BusinessGateway\System\Service;

class Client extends \SoapClient
{
    private $environment;
    private $service;
    private $credentials;
    private $cert;

    public function __construct(Cert $cert, Credentials $credentials, Environment $environment, Service $service, $options = array())
    {
        $this->environment = $environment;
        $this->service = $service;
        $this->credentials = $credentials;
        $this->cert = $cert;

        $options['local_cert'] = $cert->getCertLocation();
        $options['passphrase'] = $cert->getCertPassPhrase();
        $options['login'] = $credentials->getUsername();
        $options['password'] = $credentials->getPassword();

        return parent::__construct($environment->getUri() . '/' . $service->getWsdlName(), $options);

    }
    public function sendRequest($body)
    {
        return $this->__soapCall($this->service->getRequestName(), $body);
    }


}