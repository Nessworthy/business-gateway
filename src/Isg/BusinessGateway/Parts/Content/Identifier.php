<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\NormalizedStringType;
use Isg\BusinessGateway\Parts\Primitive\StringType;

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
