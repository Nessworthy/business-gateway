<?php declare(strict_types=1);
namespace Isg\BusinessGateway\System;

/**
 * Interface Service
 * Contains essential methods the package uses when interacting with a service.
 *
 * @package Isg\BusinessGateway\System
 */
interface Service
{
    /**
     * Fetch the name of the WSDL.
     * Used to find the local WSDL file in this package.
     * @return string
     */
    public function getWsdlName() : string;

    /**
     * Fetch the request action name.
     * This action is used when attempting to fetch data from the API.
     * @return string
     */
    public function getRequestName() : string;

    /**
     * Retrieve the version of this request.
     * Used to generate the request URI, and maybe a few other parts.
     * @return string
     */
    public function getVersion() : string;

    /**
     * Retrieve the top-level namespace for this request.
     * @return string
     */
    public function getNamespace() : string;

    /**
     * Retrieves the system name for this request.
     * Used for factories, etc.
     * @return string
     */
    public function getServiceName() : string;
}
