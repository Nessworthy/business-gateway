<?php
namespace Nessworthy\BusinessGateway\Parts\Content;

use Nessworthy\BusinessGateway\Parts\Primitive\DecimalType;
use Nessworthy\BusinessGateway\Parts\Primitive\NormalizedStringType;

/**
 * Class Amount
 * Supporting attributes:
 *  - CurrencyID
 * @package Nessworthy\BusinessGateway\Parts\Content
 */
class Amount extends DecimalType
{
    private $currencyId;

    /**
     * @param NormalizedStringType $currencyId
     */
    public function setCurrencyID(NormalizedStringType $currencyId)
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return mixed
     */
    public function getCurrencyID()
    {
        return $this->currencyId;
    }
}