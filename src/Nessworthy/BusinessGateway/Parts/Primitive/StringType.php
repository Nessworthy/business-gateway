<?php
namespace Nessworthy\BusinessGateway\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\InvalidPrimitiveTypeException;
use Nessworthy\BusinessGateway\Parts\Restrictions\Enumeration;
use Nessworthy\BusinessGateway\Parts\Restrictions\MaxLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\MinLength;
use Nessworthy\BusinessGateway\Parts\Restrictions\Pattern;
use Nessworthy\BusinessGateway\Parts\ValidationRestrictionException;

/**
 * The base type to represent a string.
 * @package Nessworthy\BusinessGateway\Parts\Primitive
 */
class StringType extends BaseSimpleType
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
        if($var === null || is_scalar($var) || is_callable([$var, '__toString']))
        {
            return (string) $var;
        }

        throw new InvalidPrimitiveTypeException(sprintf(
            '%s expected a string or type which can be converted to string, %s given.',
            get_class($this),
            gettype($var)
        ));
    }

    /**
     * StringType constructor.
     * @param string $string A text string.
     */
    public function __construct($string) {

        $className = get_class($this);

        $string = $this->convertType($string);

        if($this instanceof MinLength) {

            $length = strlen($string);
            $minLength = $this->getMinLength();

            if($length < $minLength) {
                throw new ValidationRestrictionException(sprintf(
                    '%s expected a string of at least %s character%s, %s given.',
                    $className,
                    $minLength,
                    $minLength === 1 ? '' : 's',
                    $length
                ));
            }
        }

        if($this instanceof MaxLength) {

            $length = strlen($string);
            $maxLength = $this->getMaxLength();

            if($length > $maxLength) {
                throw new ValidationRestrictionException(sprintf(
                    '%s expected a string of at most %s character%s, %s given.',
                    $className,
                    $maxLength,
                    $maxLength === 1 ? '' : 's',
                    $length
                ));
            }
        }

        if($this instanceof Pattern) {
            $pattern = $this->getPattern();
            if(preg_match($pattern, $string) !== 1) {

                throw new ValidationRestrictionException(sprintf(
                    '%s expected a string matching the pattern ' . "\n" . '%s.',
                    $className,
                    $pattern
                ));
            }
        }

        if($this instanceof Enumeration) {
            $choices = $this->getEnumerableChoices();
            if(!in_array($string, $choices)) {
                throw new ValidationRestrictionException(sprintf(
                    '%s expected one of the following choices: %s, "%s" given',
                    implode(', ', $choices),
                    $string
                ));
            }
        }

        return parent::__construct($string);
    }
}