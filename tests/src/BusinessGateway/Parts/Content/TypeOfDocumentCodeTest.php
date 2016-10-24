<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Content;

use Isg\BusinessGateway\Parts\Content\TypeOfDocumentCode;
use Isg\BusinessGateway\Parts\ValidationRestrictionException;

class TypeOfDocumentCodeTest extends \PHPUnit_Framework_TestCase
{
    public function testAcceptsValidCode()
    {
        $object = new TypeOfDocumentCode(TypeOfDocumentCode::CODE_ABSTRACT);
        $this->assertSame((string) TypeOfDocumentCode::CODE_ABSTRACT, $object->getValue());
    }

    public function testRejectsInvalidCode()
    {
        $this->expectException(ValidationRestrictionException::class);
        new TypeOfDocumentCode('License');
    }
}