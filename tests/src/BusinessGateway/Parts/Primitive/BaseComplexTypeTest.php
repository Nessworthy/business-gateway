<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Tests\Parts\Primitive;

use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class BaseComplexTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testChildrenAreDefinedOnLoad()
    {
        /** @var mixed $mock */
        $mock = $this->getMockBuilder(BaseComplexType::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
        $mock
            ->expects($this->once())
            ->method('defineChildren');

        $mock->__construct();
    }
}