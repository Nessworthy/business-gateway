<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Environments;

use Nessworthy\BusinessGateway\System\Environment;

/**
 * The base environment class. Use or extend on this to define a simple environment.
 * @package Nessworthy\BusinessGateway\Environments
 */
class Base implements Environment
{
    private $uri;

    /**
     * Base constructor.
     * @param string $uri The URI of the environment endpoint.
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    /**
     * The endpoint URI for this environment.
     * @return string
     */
    public function getUri() : string
    {
        return $this->uri;
    }

}