<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Credentials;

use Isg\BusinessGateway\System\Credentials;

/**
 * Class Simple
 * Holds simple credentials, provided on instantiation as plain text.
 * @package Isg\BusinessGateway\Credentials
 */
class Simple implements Credentials
{
    private $username;
    private $password;

    /**
     * Simple constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() : string
    {
        return $this->password;
    }
}
