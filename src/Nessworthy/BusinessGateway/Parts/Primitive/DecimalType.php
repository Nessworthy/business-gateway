<?php
namespace Nessworthy\BusinessGateway\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\InvalidPrimitiveTypeException;
use Nessworthy\BusinessGateway\Parts\Restrictions\Enumeration;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\ValidationRestrictionException;

/**
 * The base type to represent a string.
 * @package Nessworthy\BusinessGateway\Parts\Primitive
 */
class DecimalType extends BaseSimpleType
{
    /**
     * Convert the data into a more suitable form.
     * @param mixed $var
     * @return string
     */
    protected function convertType($var)
    {
        /**
         * Possible php string conversions.
         * Props to user mpen of StackOverflow
         * @link http://stackoverflow.com/a/27368848/2274710
         */
       if(is_numeric($var)) {
           return (float) $var;
       }

        throw new InvalidPrimitiveTypeException(sprintf(
            '%s expected a float or type which can be converted to float, %s given.',
            __CLASS__,
            gettype($var)
        ));
    }

    public function __construct($float) {

        $className = __CLASS__;

        $float = $this->convertType($float);

        if($this instanceof MinLength) {

            $minLength = $this->getMinLength();

            if($float < $minLength) {
                throw new ValidationRestrictionException(sprintf(
                    '%s expected a float of at least %s, %s given.',
                    $className,
                    $minLength,
                    $minLength === 1 ? '' : 's',
                    $float
                ));
            }
        }

        if($this instanceof MaxLength) {

            $maxLength = $this->getMaxLength();

            if($float < $maxLength) {
                throw new ValidationRestrictionException(sprintf(
                    '%s expected a float of at most %s, %s given.',
                    $className,
                    $maxLength,
                    $maxLength === 1 ? '' : 's',
                    $float
                ));
            }
        }

        if($this instanceof Enumeration) {
            $choices = $this->getEnumerableChoices();
            if(!in_array($float, $choices)) {
                throw new ValidationRestrictionException(sprintf(
                    '%s expected one of the following choices: %s, "%s" given',
                    implode(', ', $choices),
                    $float
                ));
            }
        }

        return parent::__construct($float);
    }
}