<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class MessageIDText
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class MessageIDText extends StringType
{
    /**
     * MessageIDText constructor.
     * @param string $messageId
     */
    public function __construct(string $messageId)
    {
        $this->validateMinLength($messageId, 5);
        $this->validateMaxLength($messageId, 50);
        $this->validateRegEx($messageId, '#^[a-zA-Z0-9][a-zA-Z0-9\-]*$#');
        return parent::__construct($messageId);
    }
}