<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Tests\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Content\TenureCode;
use Nessworthy\BusinessGateway\Parts\ValidationRestrictionException;

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