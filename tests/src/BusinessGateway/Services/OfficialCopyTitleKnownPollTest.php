<?php
namespace Nessworthy\BusinessGateway\Tests\Parts\Primitive;

use Nessworthy\BusinessGateway\Services\OfficialCopyTitleKnownPoll;

class OfficialCopyTitleKnownPollTest extends \PHPUnit_Framework_TestCase
{
    /** @var OfficialCopyTitleKnownPoll */
    private $service;

    public function setUp()
    {
        $this->service = new OfficialCopyTitleKnownPoll();
    }

    public function testReturnResponseTypes()
    {
        $this->assertSame('string', gettype($this->service->getRequestName()));
        $this->assertSame('string', gettype($this->service->getVersion()));
        $this->assertSame('string', gettype($this->service->getNamespace()));
        $this->assertSame('string', gettype($this->service->getWsdlName()));
    }
}