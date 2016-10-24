<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Primitive;

use Isg\BusinessGateway\Parts\Primitive\DateTimeType;

class DateTimeTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testDateTimeTypeAcceptsValidDate()
    {
        $dateObject = new DateTimeType('01/01/2010 01:23:45');
        $this->assertSame('2010-01-01T01:23:45+00:00', $dateObject->getValue());
    }

    public function testDateTimeTypeDoesNotAcceptInvalidDate()
    {
        $this->expectException(\Exception::class);
        new DateTimeType('Foo Bar');
    }
}