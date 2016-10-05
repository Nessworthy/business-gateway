<?php
namespace Nessworthy\BusinessGateway\Tests\Parts\Primitive;


use Nessworthy\BusinessGateway\Parts\Primitive\BaseSimpleType;

class BaseSimpleTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testToStringReturnsDataGiven()
    {
        $string = 'Test String';
        $mock = $this->getMockBuilder(BaseSimpleType::class)
            ->setConstructorArgs([$string])
            ->getMockForAbstractClass();
        $this->assertSame($string, (string) $mock);
    }
}