<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\NormalizedStringType;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

class Identifier extends NormalizedStringType
{
    private $schemeAgencyName;
    private $schemeName;

    public function setSchemeAgencyName(StringType $schemeAgencyName)
    {
        $this->schemeAgencyName = $schemeAgencyName;
    }

    public function setSchemeName(StringType $schemeName)
    {
        $this->schemeName = $schemeName;
    }

    public function getSchemeAgencyName()
    {
        return $this->schemeAgencyName;
    }

    public function getSchemeName()
    {
        return $this->schemeName;
    }
}