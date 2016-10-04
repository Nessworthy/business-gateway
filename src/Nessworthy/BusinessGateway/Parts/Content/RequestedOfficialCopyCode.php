<?php
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\NormalizedStringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\Enumeration;

/**
 * Class RequestedOfficialCopyCode
 * Holds a requested copy code reference.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class RequestedOfficialCopyCode extends NormalizedStringType implements Enumeration
{
    const CODE_REGISTER_ONLY = 10;
    const CODE_TITLE_ONLY = 20;
    const CODE_REGISTER_AND_TITLE_PLAN = 30;
    const CODE_CI = 40;
    const CODE_CI_AND_REGISTER = 50;

    /**
     * @inheritDoc
     */
    function getEnumerableChoices()
    {
        return [
            self::CODE_REGISTER_ONLY,
            self::CODE_TITLE_ONLY,
            self::CODE_REGISTER_AND_TITLE_PLAN,
            self::CODE_CI,
            self::CODE_CI_AND_REGISTER
        ];
    }
}