<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Content;

use Isg\BusinessGateway\Parts\Primitive\StringType;

/**
 * Class PropertyDescriptionText
 * Holds a property description.
 * @package Isg\BusinessGateway\Parts\Content
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
