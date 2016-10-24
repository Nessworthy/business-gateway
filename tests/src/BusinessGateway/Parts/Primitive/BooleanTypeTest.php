<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Primitive;

use Isg\BusinessGateway\Parts\Primitive\BooleanType;

class BooleanTypeTest extends \PHPUnit_Framework_TestCase
{

    public function testBooleanTypeAcceptsBooleans()
    {
        $boolObjectTrue = new BooleanType(true);
        $boolObjectFalse = new BooleanType(false);

        $this->assertTrue($boolObjectTrue->getValue());
        $this->assertFalse($boolObjectFalse->getValue());
    }
}