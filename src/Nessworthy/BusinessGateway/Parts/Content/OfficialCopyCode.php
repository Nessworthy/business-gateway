<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\NormalizedStringType;

/**
 * Class OfficialCopyCode
 * Holds a copy code reference.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class OfficialCopyCode extends NormalizedStringType
{
    const CODE_OC1 = '10';
    const CODE_OC2 = '20';

    /**
     * OfficialCopyCode constructor.
     * @param string $officialCopyCode
     */
    public function __construct(string $officialCopyCode)
    {
        $this->validateEnumeration(
            $officialCopyCode,
            [
                self::CODE_OC1,
                self::CODE_OC2,
            ]
        );
        return parent::__construct($officialCopyCode);
    }
}
