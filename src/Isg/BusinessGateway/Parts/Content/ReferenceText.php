<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class ReferenceText
 * Holds a reference identifier.
 * @package Isg\BusinessGateway\Parts\Content
 */
class ReferenceText extends StringType
{
    /**
     * ReferenceText constructor.
     * @param string $reference
     */
    public function __construct(string $reference)
    {
        $this->validateMinLength($reference, 1);
        $this->validateMaxLength($reference, 25);
        $this->validateRegEx($reference, '#^[A-Za-z0-9\s~!"@\#$%\'\(\)\*\+,\-\./:;=\?\[\\\\\]_\{\}\^£&]*$#');
        return parent::__construct($reference);
    }
}
