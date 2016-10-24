<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Parts\Primitive;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Isg\BusinessGateway\Parts\SimpleType;

abstract class BaseSimpleType implements SimpleType
{
    private $_;

    /**
     * BaseSimpleType constructor.
     * Pass the data to store.
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->_ = $data;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->_;
    }

    /**
     * @inheritDoc
     */
    public function __get($key)
    {
        if ($key === '_') {
            return $this->_;
        }
        throw new InvalidArgumentException('Undefined property ' . $key);
    }

    /**
     * Return the value of this simple type.
     * @return mixed
     */
    public function getValue()
    {
        return $this->_;
    }
}
