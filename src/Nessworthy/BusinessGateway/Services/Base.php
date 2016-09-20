<?php
namespace Nessworthy\BusinessGateway\Services;

use Nessworthy\BusinessGateway\System\Service;

abstract class Base implements Service
{
    /**
     * @inheritDoc
     */
    public function getWsdlName()
    {
        return sprintf(
            '%s%s%s?wsdl',
            $this->getServiceName(),
            $this->getServiceVersion(),
            $this->getServiceType()
        );
    }

    /**
     * @return string
     */
    abstract protected function getServiceName();

    /**
     * @return string
     */
    protected function getServiceVersion()
    {
        return 'V' . str_replace('.', '_', $this->getVersion());
    }

    /**
     * @return string
     */
    abstract protected function getServiceType();
}