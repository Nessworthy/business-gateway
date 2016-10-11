<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\BusinessEntities\ResponseSearchByPropertyDescriptionV2_0\Q1Address;
use Nessworthy\BusinessGateway\Parts\Content\Text;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

class Q1Title extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('TitleNumber', 1, 1);
        $this->defineChild('Description', 0, 1);
        $this->defineChild('TenureInformation', 1, 1);
        $this->defineChild('Address', 1, 1);
    }

    public function __construct(
        Text $titleNumber,
        Q1TenureInformation $tenureInformation,
        Q1Address $address
    )
    {
        parent::__construct();
        $this->addChild('TitleNumber', $titleNumber);
        $this->addChild('TenureInformation', $tenureInformation);
        $this->addChild('Address', $address);
    }

    public function setDescription(Text $description)
    {
        $this->addChild('Description', $description);
    }

}