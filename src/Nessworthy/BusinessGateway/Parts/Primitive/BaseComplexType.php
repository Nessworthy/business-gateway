<?php
namespace Nessworthy\BusinessGateway\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\ComplexType;
use Nessworthy\BusinessGateway\Parts\InvalidChildException;
use Nessworthy\BusinessGateway\Parts\SimpleType;
use Nessworthy\BusinessGateway\Parts\ValidationRestrictionException;
use Psr\Log\InvalidArgumentException;

abstract class BaseComplexType implements ComplexType
{
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
    public function sanityCheck()
    {
        foreach($this->children as $key => $children) {
            $range = $this->childrenRange[$key];

            $count = 0;
            if(!is_null($children)) {
                $count = 1;
            }
            if(is_array($children)) {
                $count = count($children);
            }

            $className = __CLASS__;

            if(
                $range['minimum'] !== self::UNBOUNDED
                && $range['maximum'] !== self::UNBOUNDED
                && $range['minimum'] === $range['maximum']
                && $count !== $range['minimum']
            ) {
                throw new ValidationRestrictionException(sprintf(
                    'Child key %s expects to be defined exactly %s time%s in %s, %s given.',
                    $key,
                    $range['minimum'],
                    $range['minimum'] === 1 ? '' : 's',
                    $className,
                    $count
                ));
            } elseif($range['minimum'] !== self::UNBOUNDED && $range['minimum'] > $count) {
                throw new \InvalidArgumentException(sprintf(
                    'Child key %s should be defined at least %s time%s in %s, %s given.',
                    $key,
                    $range['minimum'],
                    $range['minimum'] === 1 ? '' : 's',
                    $className,
                    $count
                ));
            } elseif ($range['maximum'] !== self::UNBOUNDED && $range['maximum'] < $count) {
                throw new \InvalidArgumentException(sprintf(
                    'Child key %s should be defined at most %s time%s in %s, %s given.',
                    $key,
                    $range['maximum'],
                    $range['maximum'] === 1 ? '' : 's',
                    $className,
                    $count
                ));
            }

            if(!is_array($children)) {
                $children = array($children);
            }
            foreach($children as $child) {
                $child->sanityCheck($child);
            }
        }
        return true;
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
     * @return SimpleType|ComplexType|array|null
     */
    public function getChild($childKey)
    {
        if(!is_string($childKey)) {
            throw new \InvalidArgumentException(sprintf('Child key should be a string, %s given.', gettype($childKey)));
        }

        if(array_key_exists($childKey, $this->children)) {
            return $this->children[$childKey];
        }

        throw new InvalidChildException(sprintf(
            'Tried to retrieve invalid child named %s in %s.',
            $childKey,
            __CLASS__
        ));
    }

    public function __call($key, $arguments)
    {
        if(strpos($key, 'get', 0) === '0') {
            return $this->getChild($key);
        }

        throw new \BadFunctionCallException('Call to undefined method %s in %s', $key, __CLASS__);
    }

    /**
     * Set a child's value.
     * If multiple children are allowed, will add this child to the group. If not, an exception will be thrown.
     * Children must be defined using defineChild first.
     * @throws \InvalidArgumentException If a non-string is used as a key, or the child was attempted to be overwritten.
     * @param string $key The key.
     * @param SimpleType|ComplexType $value
     */
    protected function addChild($key, $value)
    {
        if(!is_string($key)) {
            throw new \InvalidArgumentException(sprintf('Child key should be a string, %s given.', gettype($key)));
        }

        if(!array_key_exists($key, $this->children)) {
            throw new \InvalidArgumentException('Tried to add a child to undefined key ' . $key . '.');
        }

        $range = $this->childrenRange[$key];

        if($range['maximum'] !== self::UNBOUNDED) {
            // Defined maximum amount!
            if($range['maximum'] === 1 && !is_null($this->children[$key])) {
                throw new \InvalidArgumentException(sprintf(
                    'Tried to add child of key %s which would exceed the maximum allowed amount of %s.',
                    $key,
                    $range['maximum']
                ));
            } else if($range['maximum'] > 1 && count($this->children[$key]) >= $range['maximum']) {
                throw new \InvalidArgumentException(sprintf(
                    'Tried to add child of key %s which would exceed the maximum allowed amount of %s.',
                    $key,
                    $range['maximum']
                ));
            }
        }

        if(is_array($this->children[$key])) {
            $this->children[$key][] = $value;
        } else {
            $this->children[$key] = $value;
        }
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
        if(!is_string($key)) {
            throw new \InvalidArgumentException(sprintf('Child key should be a string, %s given.', gettype($key)));
        }

        if($minimum !== self::UNBOUNDED) {
            if(!is_integer($minimum)) {
                throw new \InvalidArgumentException(sprintf(
                    'Minimum children definition for key %s expected to be a number, %s given.',
                    $key,
                    gettype($minimum)
                ));
            }

            if($minimum < 0) {
                throw new \InvalidArgumentException(sprintf(
                    'Minimum children definition for key %s expected to be zero or greater, %s given.',
                    $key,
                    $minimum
                ));
            }
        }

        if($maximum !== self::UNBOUNDED) {
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

        if($minimum !== self::UNBOUNDED && $maximum !== self::UNBOUNDED && $minimum > $maximum) {
            throw new \InvalidArgumentException(sprintf(
                'Minimum children definition for key %s expected to be less than the given maximum amount of %s, %s given.',
                $key,
                $maximum,
                $minimum
            ));
        }

        if(array_key_exists($key, $this->children)) {
            throw new \InvalidArgumentException(sprintf('Child key "%s" attempting to be defined twice.', $key));
        }

        if($maximum === 1) {
            $this->children[$key] = null;
        } else {
            $this->children[$key] = array();
        }

        $this->childrenRange[$key] = array('minimum' => $minimum, 'maximum' => $maximum);

    }
}