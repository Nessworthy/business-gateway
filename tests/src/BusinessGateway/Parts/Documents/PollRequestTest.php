<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Documents;

use Isg\BusinessGateway\Parts\BusinessEntities\PollRequest\Q1Identifier;
use Isg\BusinessGateway\Parts\Documents\PollRequest;

class PollRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testIdentifier()
    {
        $identifier = $this->createMock(Q1Identifier::class);
        $object = new PollRequest($identifier);
        $this->assertSame($identifier, $object->ID);
    }
}