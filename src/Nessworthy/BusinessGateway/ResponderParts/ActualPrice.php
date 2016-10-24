<?php declare(strict_types=1);
namespace Nessworthy\BusinessGateway\ResponderParts;

class ActualPrice
{
    private $grossAmount;
    private $netAmount;
    private $vatAmount;

    /**
     * ActualPrice constructor.
     * @param float $grossAmount
     * @param float|null $netAmount
     * @param float|null $vatAmount
     */
    public function __construct(float $grossAmount, float $netAmount = 0.0, float $vatAmount = 0.0)
    {
        $this->grossAmount = $grossAmount;
        $this->netAmount = $netAmount;
        $this->vatAmount = $vatAmount;
    }

    public function getGrossAmount() : float
    {
        return $this->grossAmount;
    }

    public function getNetAmount() : float
    {
        return $this->netAmount;
    }

    public function getVatAmount() : float
    {
        return $this->vatAmount;
    }
}
