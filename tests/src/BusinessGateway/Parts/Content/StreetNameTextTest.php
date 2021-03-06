<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Content;

use Isg\BusinessGateway\Parts\Content\StreetNameText;
use Isg\BusinessGateway\Parts\ValidationRestrictionException;

class StreetNameTextTest extends \PHPUnit_Framework_TestCase
{
    public function testValueObjectBehaviour()
    {
        $object = new StreetNameText('Foo');

        $this->assertSame('Foo', $object->getValue());
    }

    public function testOutOfLowerBoundThrowsException()
    {
        $this->expectException(ValidationRestrictionException::class);
        new StreetNameText('');
    }

    public function testOutOfUpperBoundThrowsException()
    {
        $this->expectException(ValidationRestrictionException::class);
        new StreetNameText(implode('', array_fill(0, 81, 'x')));
    }

    public function testStreetNameDoesntAllowOnlySpaces()
    {
        $this->expectException(ValidationRestrictionException::class);
        new StreetNameText('     ');
    }
}