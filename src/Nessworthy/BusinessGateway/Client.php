<?php declare(strict_types = 1);
namespace Nessworthy\BusinessGateway;

use Nessworthy\BusinessGateway\Responders\ResponderFactory;
use Nessworthy\BusinessGateway\Responders\Soap\SoapResponse;
use Nessworthy\BusinessGateway\System\Cert;
use Nessworthy\BusinessGateway\System\Credentials;
use Nessworthy\BusinessGateway\System\EncryptedCert;
use Nessworthy\BusinessGateway\System\Environment;
use Nessworthy\BusinessGateway\System\Service;

/**
 * Class Client
 * The main Client to handle requests to the land registry.
 * @package Nessworthy\BusinessGateway
 */
class Client extends \SoapClient
{
    private $environment;
    private $service;
    private $credentials;
    private $cert;
    protected $locale = 'en';

    /**
     * Client constructor.
     * @param Cert $cert
     * @param Credentials $credentials
     * @param Environment $environment
     * @param Service $service
     * @param array $soapClientOptions Any additional options to pass directly to SoapClient
     */
    public function __construct(
        Cert $cert,
        Credentials $credentials,
        Environment $environment,
        Service $service,
        array $soapClientOptions = array()
    ) {
        $this->environment = $environment;
        $this->service = $service;
        $this->credentials = $credentials;
        $this->cert = $cert;

        $soapClientOptions['local_cert'] = $cert->getCertLocation();
        if ($cert instanceof EncryptedCert) {
            $soapClientOptions['passphrase'] = $cert->getCertPassPhrase();
        }
        $soapClientOptions['login'] = $credentials->getUsername();
        $soapClientOptions['password'] = $credentials->getPassword();
        $soapClientOptions['soap_version'] = SOAP_1_1;
        $soapClientOptions['cache_wsdl'] = WSDL_CACHE_NONE;

        $soapClientOptions['location'] = $environment->getUri() . '/' . $service->getWsdlName();

        // return parent::__construct($environment->getUri() . '/' . $service->getWsdlName() . '?wsdl, $options);
        return parent::__construct(
            __DIR__ . '/assets/schemas/' . $service->getWsdlName() . '.wsdl',
            $soapClientOptions
        );
    }

    /**
     * Build the headers for an API request.
     * A lot of this is really hack-y because SoapClient is terrible in some respects.
     * @return array
     */
    private function buildHeaders() : array
    {
        $wsseNamespace = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';
        $i18nNamespace = 'http://www.w3.org/2005/09/ws-i18n';
        $passType = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText';

        // I HATE SOAP-VAR, SOAP-CLIENT, AND SOAP-HEADER.

        // WSSE Security
        $xml = sprintf('<wsse:Security xmlns:wsse="%s">', $wsseNamespace);
        $xml .= '<wsse:UsernameToken>';
        $xml .= sprintf('<wsse:Username>%s</wsse:Username>', $this->credentials->getUsername());
        $xml .= sprintf('<wsse:Password type="%s">%s</wsse:Password>', $passType, $this->credentials->getPassword());
        $xml .= '</wsse:UsernameToken>';
        $xml .= '</wsse:Security>';

        $wsse = new \SoapVar($xml, XSD_ANYXML);

        // i18n Locale. Override this class with the protected $this->locale to change the locale.
        // Currently, only 'en' is supported by the gateway.
        $xml = sprintf('<i18n:international xmlns:i18n="%s">', $i18nNamespace);
        $xml .= sprintf('<i18n:locale>%s</i18n:locale>', $this->locale);
        $xml .= '</i18n:international>';

        $i18n = new \SoapVar($xml, XSD_ANYXML);

        return [
            new \SoapHeader($this->service->getNamespace(), 'unused', $wsse),
            new \SoapHeader($this->service->getNamespace(), 'unused', $i18n)
        ];
    }

    public function sendRequest($body)
    {
        $result = $this->__soapCall(
            $this->service->getRequestName(),
            [['arg0' => $body]],
            null,
            $this->buildHeaders()
        );
        return $result;
        $initialResponse = new SoapResponse($result);
        $factory = new ResponderFactory();

        $response = $factory->create($this->service->getServiceName(), $initialResponse);

        return $response;
    }

    public function __doRequest($request, $location, $action, $version, $one_way = 0)
    {
        /*$doc = new \DOMDocument('1.0');
        $doc->loadXML($request);
        $doc->formatOutput = true;
        echo $doc->saveXML();
        die();*/
        return parent::__doRequest($request, $location, $action, $version, $one_way);
    }
}
