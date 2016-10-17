<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\ValidationRestrictionException;

/**
 * The base type to represent a string.
 * @package Nessworthy\BusinessGateway\Parts\Primitive
 */
class DecimalType extends BaseSimpleType
{
    public function __construct(float $float)
    {
        return parent::__construct($float);
    }

    /**
     * Validate a given input to ensure it is greater than (or equal to) the minimum length given.
     * @param float $input
     * @param int $minLength
     */
    final protected function validateMinLength(float $input, int $minLength)
    {
        if ($input < $minLength) {
            throw new ValidationRestrictionException(sprintf(
                'Expected a float of at least %s, %s given.',
                $minLength,
                $input
            ));
        }
    }

    /**
     * Validate a given input to ensure it is less than (or equal to) the maximum length given.
     * @throws ValidationRestrictionException
     * @param float $input
     * @param int $maxLength
     */
    final protected function validateMaxLength(float $input, int $maxLength)
    {
        if ($input > $maxLength) {
            throw new ValidationRestrictionException(sprintf(
                'Expected a float of at most %s, %s given.',
                $maxLength,
                $input
            ));
        }
    }

    /**
     * Validate a given input against a regular expression.
     * @throws ValidationRestrictionException
     * @param float $input
     * @param string $pattern
     */
    final protected function validateRegEx(float $input, string $pattern)
    {
        if (preg_match($pattern, $input) !== 1) {
            throw new ValidationRestrictionException(sprintf(
                'Expected a float matching the pattern ' . "\n" . '%s.',
                $pattern
            ));
        }
    }

    /**
     * Validate a given input against an array of choices.
     * @throws ValidationRestrictionException
     * @param float $input
     * @param float[] $choices
     */
    final protected function validateEnumeration(float $input, array $choices)
    {
        if (!in_array($input, $choices, true)) {
            throw new ValidationRestrictionException(sprintf(
                'Expected one of the following choices: %s, "%s" given',
                implode(', ', $choices),
                $input
            ));
        }
    }
}
