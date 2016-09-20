<?php
namespace Nessworthy\BusinessGateway\Credentials;

use Nessworthy\BusinessGateway\System\Credentials;

class Simple implements Credentials
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }


}