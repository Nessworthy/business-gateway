<?php
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\NormalizedStringType;

/**
 * Class RequestedOfficialCopyCode
 * Holds a requested copy code reference.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class RequestedOfficialCopyCode extends NormalizedStringType
{
    const CODE_REGISTER_ONLY = '10';
    const CODE_TITLE_ONLY = '20';
    const CODE_REGISTER_AND_TITLE_PLAN = '30';
    const CODE_CI = '40';
    const CODE_CI_AND_REGISTER = '50';

    /**
     * RequestedOfficialCopyCode constructor.
     * @param string $officialCopyCode
     */
    public function __construct(string $officialCopyCode)
    {
        $this->validateEnumeration(
            $officialCopyCode,
            [
                self::CODE_REGISTER_ONLY,
                self::CODE_TITLE_ONLY,
                self::CODE_REGISTER_AND_TITLE_PLAN,
                self::CODE_CI,
                self::CODE_CI_AND_REGISTER
            ]
        );
        return parent::__construct($officialCopyCode);
    }
}