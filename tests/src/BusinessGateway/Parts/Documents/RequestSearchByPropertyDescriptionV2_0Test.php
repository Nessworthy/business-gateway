<?php
namespace Nessworthy\BusinessGateway\Tests\Parts\Documents;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Nessworthy\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0\Q1Product;
use Nessworthy\BusinessGateway\Parts\Documents\RequestSearchByPropertyDescriptionV2_0;

class RequestSearchByPropertyDescriptionV2_0Test extends \PHPUnit_Framework_TestCase
{
    public function testHierarchy()
    {
        $identifier = $this->createMock(Q1Identifier::class);
        $product = $this->createMock(Q1Product::class);

        $object = new RequestSearchByPropertyDescriptionV2_0($identifier, $product);
        $this->assertSame($identifier, $object->ID);
        $this->assertSame($product, $object->Product);
    }
}