<?php

namespace App\Domain\Dashboard;

/**
 * Class DashboardFilter
 * @package App\Domain\Dashboard
 */
class DashboardFilter
{
    /**
     * @var string|null $division
     */
    private $division;
    /**
     * @var string|null $provider
     */
    private $provider;
    /**
     * @var int|null $month
     */
    private $month;
    /**
     * @var int $year
     */
    private $year;
    /**
     * @var bool $credit
     */
    private $credit;
    /**
     * @var bool $oneTime
     */
    private $oneTime;
    /**
     * @var int $clientId
     */
    private $clientId;
    /**
     * @var bool $tax
     */
    private $tax;

    /**
     * @return string|null
     */
    public function getDivision():? string
    {
        return $this->division;
    }

    /**
     * @param array|null $division
     * @return $this
     */
    public function setDivision(?array $division): self
    {
        if (!empty($division)) {
            $this->division = implode(',', $division);
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProvider(): ?string
    {
        return $this->provider;
    }

    /**
     * @param array|null $provider
     * @return $this
     */
    public function setProvider(?array $provider): self
    {
        if (!empty($provider)) {
            $this->provider = implode(',', $provider);
        }

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMonth():? int
    {
        return $this->month;
    }

    /**
     * @param int|null $month
     * @return $this
     */
    public function setMonth(?int $month): self
    {
        $this->month = $month;

        return $this;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return self
     */
    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCredit(): bool
    {
        return $this->credit;
    }

    /**
     * @param bool $credit
     * @return self
     */
    public function setCredit(bool $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * @return bool
     */
    public function getOneTime(): bool
    {
        return $this->oneTime;
    }

    /**
     * @param bool $oneTime
     * @return self
     */
    public function setOneTime(bool $oneTime): self
    {
        $this->oneTime = $oneTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return self
     */
    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return bool
     */
    public function getTax(): bool
    {
        return $this->tax;
    }

    /**
     * @param bool $tax
     * @return DashboardFilter
     */
    public function setTax(bool $tax): self
    {
        $this->tax = $tax;

        return $this;
    }
}
