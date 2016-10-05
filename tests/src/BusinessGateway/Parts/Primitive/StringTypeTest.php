<?php
namespace Nessworthy\BusinessGateway\Tests\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\InvalidPrimitiveTypeException;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

class StringTypeText extends \PHPUnit_Framework_TestCase
{
    public function scalarProvider()
    {
        return [
            [0],
            [-1],
            [10.523],
        ];
    }
    public function testStringTypeAcceptsString()
    {
        $example = 'Hello World!';
        $object = new StringType($example);

        $this->assertSame($example, $object->get_());
    }

    /**
     * @dataProvider scalarProvider
     * @param mixed $var
     */
    public function testStringTypeAcceptsScalarNonString($var)
    {
        $object = new StringType($var);

        $this->assertSame((string) $var, $object->get_());
    }

    public function testNonStringableInputThrowsInvalidPrimitiveTypeException()
    {
        $this->expectException(InvalidPrimitiveTypeException::class);
        new StringType(new \stdClass());
    }
}