<?php
namespace Nessworthy\BusinessGateway\Tests\Parts\Documents;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\PollRequest\Q1Identifier;
use Nessworthy\BusinessGateway\Parts\Documents\PollRequest;

class PollRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testIdentifier()
    {
        $identifier = $this->createMock(Q1Identifier::class);
        $object = new PollRequest($identifier);
        $this->assertSame($identifier, $object->ID);
    }
}