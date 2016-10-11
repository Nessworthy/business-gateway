<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\ValidationRestrictionException;

/**
 * The base type to represent a string.
 * @package Nessworthy\BusinessGateway\Parts\Primitive
 */
class StringType extends BaseSimpleType
{
    /**
     * StringType constructor.
     * @param string $string A text string.
     */
    public function __construct(string $string) {
        return parent::__construct($string);
    }

    /**
     * Validate a given input to ensure it is greater than (or equal to) the minimum length given.
     * @param string $input
     * @param int $minLength
     */
    final protected function validateMinLength(string $input, int $minLength) {
        $length = strlen($input);

        if($length < $minLength) {
            throw new ValidationRestrictionException(sprintf(
                'Expected a string of at least %s character%s, %s given.',
                $minLength,
                $minLength === 1 ? '' : 's',
                $length
            ));
        }
    }

    /**
     * Validate a given input to ensure it is less than (or equal to) the maximum length given.
     * @throws ValidationRestrictionException
     * @param string $input
     * @param int $maxLength
     */
    final protected function validateMaxLength(string $input, int $maxLength) {
        $length = strlen($input);

        if($length > $maxLength) {
            throw new ValidationRestrictionException(sprintf(
                'Expected a string of at most %s character%s, %s given.',
                $maxLength,
                $maxLength === 1 ? '' : 's',
                $length
            ));
        }
    }

    /**
     * Validate a given input against a regular expression.
     * @throws ValidationRestrictionException
     * @param string $input
     * @param string $pattern
     */
    final protected function validateRegEx(string $input, string $pattern) {
        if(preg_match($pattern, $input) !== 1) {
            throw new ValidationRestrictionException(sprintf(
                'Expected a string matching the pattern ' . "\n" . '%s.',
                $pattern
            ));
        }
    }

    /**
     * Validate a given input against an array of choices.
     * @throws ValidationRestrictionException
     * @param string $input
     * @param array $choices
     */
    final protected function validateEnumeration(string $input, array $choices)
    {
        if(!in_array($input, $choices, true)) {
            throw new ValidationRestrictionException(sprintf(
                'Expected one of the following choices: %s, "%s" given',
                implode(', ', $choices),
                $input
            ));
        }
    }
}