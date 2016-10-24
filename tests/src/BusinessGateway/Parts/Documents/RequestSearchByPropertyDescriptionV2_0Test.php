<?php declare(strict_types=1);
namespace Isg\BusinessGateway\Tests\Parts\Documents;

use Isg\BusinessGateway\Parts\BusinessEntities\Q1Identifier;
use Isg\BusinessGateway\Parts\BusinessEntities\RequestSearchByPropertyDescriptionV2_0\Q1Product;
use Isg\BusinessGateway\Parts\Documents\RequestSearchByPropertyDescriptionV2_0;

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