<?php
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\Enumeration;

/**
 * Class TypeOfDocumentCode
 * Holds a document code option.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class TypeOfDocumentCode extends StringType implements Enumeration
{
    const CODE_ABSTRACT = 10;
    const CODE_AGREEMENT = 20;
    const CODE_ASSENT = 30;
    const CODE_ASSIGNMENT = 40;
    const CODE_CHARGE = 50;
    const CODE_CONVEYANCE = 60;
    const CODE_DEED = 70;
    const CODE_INDENTURE = 80;
    const CODE_LEASE = 90;
    const CODE_LICENSE = 100;
    const CODE_PLAN = 110;
    const CODE_SUBCHARGE = 120;
    const CODE_TRANSFER = 130;
    const CODE_OTHER = 140;
    const CODE_COMMONHOLD_COMMUNITY_STATEMENT = 150;
    const CODE_MEMORANDUM_AND_ARTICLES_OF_ASSOCIATION = 160;
    const CODE_SURRENDER_OF_DEVELOPMENT_RIGHTS = 170;
    const CODE_TERMINATION_DOCUMENT = 180;


    /**
     * @inheritDoc
     */
    function getEnumerableChoices()
    {
        return [
            self::CODE_ABSTRACT,
            self::CODE_AGREEMENT,
            self::CODE_ASSENT,
            self::CODE_ASSIGNMENT,
            self::CODE_CHARGE,
            self::CODE_CONVEYANCE,
            self::CODE_DEED,
            self::CODE_INDENTURE,
            self::CODE_LEASE,
            self::CODE_LICENSE,
            self::CODE_PLAN,
            self::CODE_SUBCHARGE,
            self::CODE_TRANSFER,
            self::CODE_OTHER,
            self::CODE_COMMONHOLD_COMMUNITY_STATEMENT,
            self::CODE_MEMORANDUM_AND_ARTICLES_OF_ASSOCIATION,
            self::CODE_SURRENDER_OF_DEVELOPMENT_RIGHTS,
            self::CODE_TERMINATION_DOCUMENT
        ];
    }

}