<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Tests\Parts\Primitive;

use Nessworthy\BusinessGateway\Services\EnquiryByPropertyDescriptionPoll;

class EnquiryByPropertyDescriptionPollTest extends \PHPUnit_Framework_TestCase
{
    /** @var EnquiryByPropertyDescriptionPoll */
    private $service;

    public function setUp()
    {
        $this->service = new EnquiryByPropertyDescriptionPoll();
    }

    public function testReturnResponseTypes()
    {
        $this->assertSame('string', gettype($this->service->getRequestName()));
        $this->assertSame('string', gettype($this->service->getVersion()));
        $this->assertSame('string', gettype($this->service->getNamespace()));
        $this->assertSame('string', gettype($this->service->getWsdlName()));
    }
}