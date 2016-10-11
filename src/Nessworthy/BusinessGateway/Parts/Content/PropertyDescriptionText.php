<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Content;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class PropertyDescriptionText
 * Holds a property description.
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class PropertyDescriptionText extends StringType
{
    /**
     * PropertyDescriptionText constructor.
     * @param string $propertyDescription
     */
    public function __construct(string $propertyDescription)
    {
        $this->validateMinLength($propertyDescription, 1);
        $this->validateMaxLength($propertyDescription, 130);
        $this->validateRegEx($propertyDescription, '#^.*\S.*$#');
        return parent::__construct($propertyDescription);
    }
}