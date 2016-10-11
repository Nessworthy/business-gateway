<?php
namespace Nessworthy\BusinessGateway\Tests\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\Primitive\NormalizedStringType;

class NormalizedStringTypeTest extends \PHPUnit_Framework_TestCase
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
        $object = new NormalizedStringType($example);

        $this->assertSame($example, $object->getValue());
    }

    /**
     * @dataProvider scalarProvider
     * @param mixed $var
     */
    public function testStringTypeAcceptsScalarNonString($var)
    {
        $object = new NormalizedStringType($var);

        $this->assertSame((string) $var, $object->getValue());
    }

    public function testNonStringableInputThrowsInvalidPrimitiveTypeException()
    {
        $this->expectException(\TypeError::class);
        new NormalizedStringType(new \stdClass());
    }
}