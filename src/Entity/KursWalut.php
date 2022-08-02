<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\KursWalutRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KursWalutRepository::class)
 */
class KursWalut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private String $currency;

    /**
     * @ORM\Column(type="float")
     */
    private float $rateToday;

    /**
     * @ORM\Column(type="float")
     */
    private float $rateOnDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private int $percentageChange;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getRateToday(): ?float
    {
        return $this->rateToday;
    }

    public function setRateToday(float $rateToday): self
    {
        $this->rateToday = $rateToday;

        return $this;
    }

    public function getRateOnDate(): ?float
    {
        return $this->rateOnDate;
    }

    public function setRateOnDate(float $rateOnDate): self
    {
        $this->rateOnDate = $rateOnDate;

        return $this;
    }

    public function getPercentageChange(): ?int
    {
        return $this->percentageChange;
    }

    public function setPercentageChange(?float $rateToday, ?float $rateOnDate): self
    {
        $this->percentageChange = (int)($rateOnDate / $rateToday);

        return $this;
    }
}
