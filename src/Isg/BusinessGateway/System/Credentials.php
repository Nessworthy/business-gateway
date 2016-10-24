<?php declare(strict_types=1);
namespace Isg\BusinessGateway\System;

/**
 * Interface Credentials
 * A VO interface to hold username and password credentials
 * for an authenticating service.
 * @package Isg\BusinessGateway\System
 */
interface Credentials
{
    /**
     * Fetch the user name.
     * @return string
     */
    public function getUsername() : string;

    /**
     * Fetch the password.
     * @return string
     */
    public function getPassword() : string;
}