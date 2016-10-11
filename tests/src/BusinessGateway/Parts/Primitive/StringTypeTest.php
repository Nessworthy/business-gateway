<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Tests\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\InvalidPrimitiveTypeException;
use Nessworthy\BusinessGateway\Parts\Primitive\StringType;

class StringTypeText extends \PHPUnit_Framework_TestCase
{
    public function testStringTypeAcceptsString()
    {
        $example = 'Hello World!';
        $object = new StringType($example);

        $this->assertSame($example, $object->getValue());
    }

}