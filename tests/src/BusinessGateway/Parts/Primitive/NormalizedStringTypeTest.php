<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Primitive;

use Isg\BusinessGateway\Parts\Primitive\NormalizedStringType;

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

    public function testNonStringableInputThrowsInvalidPrimitiveTypeException()
    {
        $this->expectException(\TypeError::class);
        new NormalizedStringType(new \stdClass());
    }
}