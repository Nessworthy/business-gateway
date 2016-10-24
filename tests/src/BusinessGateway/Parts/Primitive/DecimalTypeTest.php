<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Primitive;

use Isg\BusinessGateway\Parts\Primitive\DecimalType;

class DecimalTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testDecimalTypeAcceptsDecimals()
    {
        $decimal = 10.501253;
        $object = new DecimalType($decimal);
        $this->assertSame($decimal, $object->getValue());
    }

    public function testDecimalTypeConvertsNumericToFloat()
    {
        $number = 101;
        $object = new DecimalType($number);
        $this->assertSame((float) $number, $object->getValue());
    }
}