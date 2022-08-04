<?php

declare(strict_types=1);

namespace App\Model;

class CurrencyRate extends FrankfurterObj
{
    private string $currency;
    private float $rateOnDay;
    private int $percentageChange;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getRateOnDay(): float
    {
        return $this->rateOnDay;
    }

    /**
     * @param float $rateOnDay
     */
    public function setRateOnDay(float $rateOnDay): void
    {
        $this->rateOnDay = $rateOnDay;
    }

    /**
     * @return int
     */
    public function getPercentageChange(): int
    {
        return $this->percentageChange;
    }

    /**
     * @param int $percentageChange
     */
    public function setPercentageChange(float $rateOnGivenDay): void
    {
        $this->percentageChange = (int)($this->getRateOnDay()/$rateOnGivenDay);
    }
}