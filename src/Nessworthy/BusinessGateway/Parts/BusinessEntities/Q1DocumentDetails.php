<?php
namespace Nessworthy\BusinessGateway\Parts\BusinessEntities;

use Nessworthy\BusinessGateway\Parts\Content\Date;
use Nessworthy\BusinessGateway\Parts\Content\Q2Text;
use Nessworthy\BusinessGateway\Parts\Content\Q3Text;
use Nessworthy\BusinessGateway\Parts\Content\TypeOfDocumentCode;
use Nessworthy\BusinessGateway\Parts\Primitive\BaseComplexType;

/**
 * Class Q1DocumentDetailsType
 * @package Nessworthy\BusinessGateway\Parts\BusinessEntities
 * @property TypeOfDocumentCode TypeOfDocumentCode
 * @property Date DateOfDocumentDate
 * @property Q2Text TitleNumberFiledUnder
 * @property Q3Text AdditionalInformation
 */
class Q1DocumentDetails extends BaseComplexType
{
    /**
     * @inheritDoc
     */
    protected function defineChildren()
    {
        $this->defineChild('TypeOfDocumentCode', 1, 1);
        $this->defineChild('DateOfDocumentDate', 0, 1);
        $this->defineChild('TitleNumberFiledUnder', 0, 1);
        $this->defineChild('AdditionalInformation', 0, 1);
    }

    /**
     * Q1DocumentDetailsType constructor.
     * @param TypeOfDocumentCode $typeOfDocumentCode
     */
    public function __construct(TypeOfDocumentCode $typeOfDocumentCode)
    {
        parent::__construct();
        $this->addChild('TypeOfDocumentCode', $typeOfDocumentCode);
    }

    /**
     * @param Date $dateOfDocumentDate
     */
    public function setDateOfDocumentDate(Date $dateOfDocumentDate)
    {
        $this->addChild('DateOfDocumentDate', $dateOfDocumentDate);
    }

    /**
     * @param Q2Text $titleNumberFiledUnder
     */
    public function setTitleNumberFiledUnder(Q2Text $titleNumberFiledUnder)
    {
        $this->addChild('TitleNumberFiledUnder', $titleNumberFiledUnder);
    }

    /**
     * @param Q3Text $additionalInformation
     */
    public function setAdditionalInformation(Q3Text $additionalInformation)
    {
        $this->addChild('AdditionalInformation', $additionalInformation);
    }

}