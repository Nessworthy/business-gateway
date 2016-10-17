<?php declare(strict_types=1);

namespace Nessworthy\BusinessGateway\Environments;

/**
 * Environment built for testing purposes.
 * @package Nessworthy\BusinessGateway\Environments
 */
class Test extends Base
{
    /**
     * Enquiry by Property Description, Office Copy Title Known, Official Search of Whole with Priority
     */
    const SERVICE_GENERAL = 'ECBG_StubService';

    /**
     * eDocument Registration Service
     */
    const SERVICE_EDOCUMENT_REGISTRATION = 'ECDRS_StubService';

    /**
     * Online Ownership Verification Service
     */
    const SERVICE_ONLINE_OWNERSHIP_VERIFICATION = 'EOOV_StubService';

    /**
     * All Other Services
     */
    const SERVICE_OTHER = 'BGStubService';

    /**
     * Test Constructor.
     * @param string $serviceGroup The service group to use. This is based on the type of request you want to use!
     */
    public function __construct(string $serviceGroup = self::SERVICE_OTHER)
    {
        return parent::__construct(sprintf('https://bgtest.landregistry.gov.uk/b2b/%s', $serviceGroup));
    }
}
