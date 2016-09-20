<?php
namespace Nessworthy\BusinessGateway\System;

interface Cert
{
    public function getCertLocation();
    public function getCertPassPhrase();
}