<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Documents;

use Isg\BusinessGateway\Parts\BusinessEntities\Q1Identifier;

use Isg\BusinessGateway\Parts\BusinessEntities\RequestTitleKnownOfficialCopyV2_1\Q1Product;
use Isg\BusinessGateway\Parts\Documents\RequestTitleKnownOfficialCopyV2_1;

class RequestTitleKnownOfficialCopyV2_1Test extends \PHPUnit_Framework_TestCase
{
    public function testHierarchy()
    {
        $identifier = $this->createMock(Q1Identifier::class);
        $product = $this->createMock(Q1Product::class);

        $object = new RequestTitleKnownOfficialCopyV2_1($identifier, $product);
        $this->assertSame($identifier, $object->ID);
        $this->assertSame($product, $object->Product);
    }
}