<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\NormalizedStringType;
use Nessworthy\BusinessGateway\Parts\Restrictions\Enumeration;

class ProductResponseCode extends NormalizedStringType implements Enumeration
{
    const CODE_OTHER = 0;
    const CODE_ACKNOWLEDGEMENT = 10;
    const CODE_REJECTION = 20;
    const CODE_RESULT = 30;

    /**
     * @inheritDoc
     */
    function getEnumerableChoices()
    {
        return [
            self::CODE_OTHER,
            self::CODE_ACKNOWLEDGEMENT,
            self::CODE_REJECTION,
            self::CODE_RESULT
        ];
    }

}