<?php declare(strict_types=1);

namespace Nessworthy\BusinessGateway\Environments;

/**
 * The production environment. This is the real thing!
 * @package Nessworthy\BusinessGateway\Environments
 */
class Production extends Base
{
    /**
     * eDocument Registration Service
     */
    const SERVICE_EDOCUMENT_REGISTRATION = 'ECDRS_SoapEngine';

    /**
     * Online Ownership Verification Service
     */
    const SERVICE_ONLINE_OWNERSHIP_VERIFICATION = 'EOOV_SoapEngine';

    /**
     * All Other Services
     */
    const SERVICE_OTHER = 'BGSoapEngine';

    /**
     * Production constructor.
     * Check the LR documentation for more information about the service groups.
     * @param string $serviceGroup The service group to use. This is based on the type of request you want to use!
     */
    public function __construct(string $serviceGroup = self::SERVICE_OTHER)
    {
        return parent::__construct(sprintf('https://businessgateway.landregistry.gov.uk/b2b/%s', $serviceGroup));
    }

}