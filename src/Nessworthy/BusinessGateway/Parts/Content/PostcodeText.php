<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class PostcodeText
 * Holds a valid UK postcode.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class PostcodeText extends StringType
{
    /**
     * PostcodeText constructor.
     * @param string $postcode
     */
    public function __construct(string $postcode)
    {
        $this->validateMinLength($postcode, 1);
        $this->validateMaxLength($postcode, 8);
        $this->validateRegEx($postcode, '#^[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][A-Z]{2}$#');
        return parent::__construct($postcode);
    }
}
