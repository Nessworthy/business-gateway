<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Primitive;

use Isg\BusinessGateway\Parts\InvalidPrimitiveTypeException;
use Isg\BusinessGateway\Parts\Primitive\StringType;

class StringTypeText extends \PHPUnit_Framework_TestCase
{
    public function testStringTypeAcceptsString()
    {
        $example = 'Hello World!';
        $object = new StringType($example);

        $this->assertSame($example, $object->getValue());
    }

}