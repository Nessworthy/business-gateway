<?php
namespace Nessworthy\BusinessGateway\Tests\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\Primitive\BooleanType;

class BooleanTypeTest extends \PHPUnit_Framework_TestCase
{

    public function testBooleanTypeAcceptsBooleans()
    {
        $boolObjectTrue = new BooleanType(true);
        $boolObjectFalse = new BooleanType(false);

        $this->assertTrue($boolObjectTrue->get_());
        $this->assertFalse($boolObjectFalse->get_());
    }

    public function testBooleanTypeAcceptsStringVersionsOfBooleans()
    {
        $boolObjectTrue = new BooleanType('true');
        $boolObjectFalse = new BooleanType('false');

        $this->assertTrue($boolObjectTrue->get_());
        $this->assertFalse($boolObjectFalse->get_());
    }

    public function testBooleanTypeDoesNotAcceptInvalidStrings()
    {
        $this->expectException(\InvalidArgumentException::class);
        new BooleanType('Some string.');
    }

    public function testBooleanTypeDoesNotAcceptFalseyInput()
    {
        $this->expectException(\InvalidArgumentException::class);
        new BooleanType(0);
    }
}