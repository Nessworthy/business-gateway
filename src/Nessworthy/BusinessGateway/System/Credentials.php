<?php
namespace Nessworthy\BusinessGateway\System;

interface Credentials
{
    public function getUsername();

    public function getPassword();
}