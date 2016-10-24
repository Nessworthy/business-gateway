<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class TenureCode
 * Holds a tenure option.
 * @package Isg\BusinessGateway\Parts\Content
 */
class TenureCode extends StringType
{
    const CODE_OTHER = '0';
    const CODE_FREEHOLD = '10';
    const CODE_LEASEHOLD = '20';
    const CODE_COMMONHOLD = '30';
    const CODE_FEUHOLD = '40';
    const CODE_MIXED = '100';
    const CODE_UNKNOWN = '110';
    const CODE_UNAVAILABLE = '120';
    const CODE_CAUTION_AGAINST_FIRST_REGISTRATION = '130';
    const CODE_RENT_CHARGE = '140';
    const CODE_FRANCHISE = '150';
    const CODE_PROFIT_A_PRENDRE_IN_GROSS = '160';
    const CODE_MANOR = '170';

    /**
     * TenureCode constructor.
     * @param string $tenureCode
     */
    public function __construct(string $tenureCode)
    {
        $this->validateEnumeration(
            $tenureCode,
            [
            self::CODE_OTHER,
            self::CODE_FREEHOLD,
            self::CODE_LEASEHOLD,
            self::CODE_COMMONHOLD,
            self::CODE_FEUHOLD,
            self::CODE_MIXED,
            self::CODE_UNKNOWN,
            self::CODE_UNAVAILABLE,
            self::CODE_CAUTION_AGAINST_FIRST_REGISTRATION,
            self::CODE_RENT_CHARGE,
            self::CODE_FRANCHISE,
            self::CODE_PROFIT_A_PRENDRE_IN_GROSS,
            self::CODE_MANOR
            ]
        );
        return parent::__construct($tenureCode);
    }
}
