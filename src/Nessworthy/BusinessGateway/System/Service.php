<?php
namespace Nessworthy\BusinessGateway\System;

interface Service
{
    /**
     * Fetch the name of the WSDL.
     * @return string
     */
    public function getWsdlName();

    /**
     * Fetch the request action name.
     * @return string
     */
    public function getRequestName();

    /**
     * Retrieve the version of this request.
     * @return string
     */
    public function getVersion();

    /**
     * Retrieve the top-level namespace for this request.
     * @return mixed
     */
    public function getNamespace();
}