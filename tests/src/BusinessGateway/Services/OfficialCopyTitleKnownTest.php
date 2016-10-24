<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Primitive;

use Isg\BusinessGateway\Services\OfficialCopyTitleKnown;

class OfficialCopyTitleKnownTest extends \PHPUnit_Framework_TestCase
{
    /** @var OfficialCopyTitleKnown */
    private $service;

    public function setUp()
    {
        $this->service = new OfficialCopyTitleKnown();
    }

    public function testReturnResponseTypes()
    {
        $this->assertSame('string', gettype($this->service->getRequestName()));
        $this->assertSame('string', gettype($this->service->getVersion()));
        $this->assertSame('string', gettype($this->service->getNamespace()));
        $this->assertSame('string', gettype($this->service->getWsdlName()));
    }
}