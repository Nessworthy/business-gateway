<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Content;

use Isg\BusinessGateway\Parts\Content\TenureCode;
use Isg\BusinessGateway\Parts\ValidationRestrictionException;

class TenureCodeTest extends \PHPUnit_Framework_TestCase
{
    public function testAcceptsValidCode()
    {
        $object = new TenureCode(TenureCode::CODE_COMMONHOLD);
        $this->assertSame((string) TenureCode::CODE_COMMONHOLD, $object->getValue());
    }

    public function testRejectsInvalidCode()
    {
        $this->expectException(ValidationRestrictionException::class);
        new TenureCode('License');
    }
}