<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Primitive;

use Isg\BusinessGateway\Parts\ComplexType;
use Isg\BusinessGateway\Parts\InvalidChildException;
use Isg\BusinessGateway\Parts\SimpleType;
use Isg\BusinessGateway\Parts\Type;
use Isg\BusinessGateway\Parts\ValidationRestrictionException;
use Psr\Log\InvalidArgumentException;

abstract class BaseComplexType implements ComplexType
{
    /**
     * Use me when you want to define no upper or lower limit for defining children.
     */
    const UNBOUNDED = '*';

    private $children = array();
    private $childrenRange = array();

    /**
     * BaseComplexType constructor.
     */
    public function __construct()
    {
        $this->defineChildren();
    }

    /**
     * @inheritDoc
     */
    public function __get($key)
    {
        return $this->getChild($key);
    }

    /**
     * Define all children this complex type contains.
     */
    abstract protected function defineChildren();

    /**
     * Fetch a child, or collection of children, for this complex object.
     *
     * @throws InvalidArgumentException
     * @throws InvalidChildException
     * @param string $childKey
     * @return ComplexType|ComplexType[]|SimpleType|SimpleType[]|null
     */
    public function getChild($childKey)
    {
        if (!is_string($childKey)) {
            throw new \InvalidArgumentException(sprintf('Child key should be a string, %s given.', gettype($childKey)));
        }

        if (array_key_exists($childKey, $this->children)) {
            return $this->children[$childKey];
        }

        throw new InvalidChildException(sprintf(
            'Tried to retrieve invalid child named %s in %s.',
            $childKey,
            get_class($this)
        ));
    }

    public function __call($key, $arguments)
    {
        if (strpos($key, 'get', 0) === 0) {
            return $this->getChild(substr($key, 3));
        }

        throw new \BadFunctionCallException(sprintf('Call to undefined method %s in %s', $key, get_class($this)));
    }

    /**
     * Set a child's value.
     * The amount of children provided MUST be within range of the children's defined range.
     * I.e. you cannot call addChild twice for the same key in order to add two children -
     * call it once with an array instead.
     * Children must be defined using defineChild first.
     * TODO: Probably split this into two: addChild(Type) and addChildren(Type[])?
     * @throws \InvalidArgumentException If a non-string is used as a key, or the child was attempted to be overwritten.
     * @param string $key The key.
     * @param Type|Type[] $value
     */
    protected function addChild($key, $value)
    {
        if (!is_string($key)) {
            throw new \InvalidArgumentException(sprintf('Child key should be a string, %s given.', gettype($key)));
        }

        if (!array_key_exists($key, $this->children)) {
            throw new \InvalidArgumentException(
                'Tried to add a child to undefined key ' . $key . '.
                If this is coming from a constructor, please ensure that parent::__construct() is called first.'
            );
        }

        if (!is_null($this->children[$key]) && (!is_array($this->children[$key]) || count($this->children[$key]) > 1)) {
            throw new \InvalidArgumentException(
                'Tried to add a child to already set key ' . $key
            );
        }

        $range = $this->childrenRange[$key];
        $numberOfValuesToAdd = is_array($value) ? count($value) : 1;

        if ($range['minimum'] !== self::UNBOUNDED) {
            if ($range['minimum'] > $numberOfValuesToAdd) {
                throw new ValidationRestrictionException(sprintf(
                    'Tried to set %s %s when the minimum defined amount for key %s is %s.',
                    $numberOfValuesToAdd,
                    $numberOfValuesToAdd === 1 ? 'child' : 'children',
                    $key,
                    $range['minimum']
                ));
            }
        }

        if ($range['maximum'] !== self::UNBOUNDED) {
            // Defined maximum amount!
            if ($range['maximum'] < $numberOfValuesToAdd) {
                throw new ValidationRestrictionException(sprintf(
                    'Tried to add %s %s of when the maximum defined amount for key %s is %s.',
                    $numberOfValuesToAdd === 1 ? 'a' : $numberOfValuesToAdd,
                    $numberOfValuesToAdd === 1 ? 'child' : 'children',
                    $key,
                    $range['maximum']
                ));
            }
        }

        $this->children[$key] = $value;
    }

    /**
     * Define a child to be set.
     * You may use BaseComplexType::UNBOUNDED to denote no upper or lower limit.
     * @throws \InvalidArgumentException
     * @param string $key
     * @param int|string $minimum The minimum number of occurrences this child can hold.
     * @param int|string $maximum The maximum number of occurrences this child can hold.
     */
    protected function defineChild($key, $minimum = 1, $maximum = 1)
    {
        if (!is_string($key)) {
            throw new \InvalidArgumentException(sprintf('Child key should be a string, %s given.', gettype($key)));
        }

        if ($minimum !== self::UNBOUNDED) {
            if (!is_integer($minimum)) {
                throw new \InvalidArgumentException(sprintf(
                    'Minimum children definition for key %s expected to be a number, %s given.',
                    $key,
                    gettype($minimum)
                ));
            }

            if ($minimum < 0) {
                throw new \InvalidArgumentException(sprintf(
                    'Minimum children definition for key %s expected to be zero or greater, %s given.',
                    $key,
                    $minimum
                ));
            }
        }

        if ($maximum !== self::UNBOUNDED) {
            if (!is_integer($maximum)) {
                throw new \InvalidArgumentException(sprintf(
                    'Maximum children definition for key %s expected to be a number, %s given.',
                    $key,
                    gettype($minimum)
                ));
            }

            if ($maximum <= 0) {
                throw new \InvalidArgumentException(sprintf(
                    'Maximum children definition for key %s expected to be greater than zero, %s given.',
                    $key,
                    $minimum
                ));
            }
        }

        if ($minimum !== self::UNBOUNDED && $maximum !== self::UNBOUNDED && $minimum > $maximum) {
            throw new \InvalidArgumentException(sprintf(
                'Minimum children definition for key %s expected to be less 
                than the given maximum amount of %s, %s given.',
                $key,
                $maximum,
                $minimum
            ));
        }

        if (array_key_exists($key, $this->children)) {
            throw new \InvalidArgumentException(sprintf('Child key "%s" attempting to be defined twice.', $key));
        }

        if ($maximum === 1) {
            $this->children[$key] = null;
        } else {
            $this->children[$key] = array();
        }

        $this->childrenRange[$key] = array('minimum' => $minimum, 'maximum' => $maximum);
    }
}
