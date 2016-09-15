<?php
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\NormalizedStringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\Enumeration;

/**
 * Class OfficialCopyCode
 * Holds a copy code reference.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class OfficialCopyCode extends NormalizedStringType implements Enumeration
{
    const CODE_REGISTER_ONLY = 10;
    const CODE_TITLE_ONLY = 20;
    /**
     * @inheritDoc
     */
    function getEnumerableChoices()
    {
        return [
            self::CODE_REGISTER_ONLY,
            self::CODE_TITLE_ONLY
        ];
    }

}