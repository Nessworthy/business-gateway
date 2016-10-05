<?php
namespace Nessworthy\BusinessGateway\Tests\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Content\TypeOfDocumentCode;
use Nessworthy\BusinessGateway\Parts\ValidationRestrictionException;

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