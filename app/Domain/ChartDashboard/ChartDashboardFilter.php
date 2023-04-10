<?php

namespace App\Domain\ChartDashboard;

/**
 * Class DashboardFilter
 * @package App\Domain\ChartDashboard
 */
class ChartDashboardFilter
{
    /**
     * @var int $year
     */
    private $year;
    /**
     * @var int $clientId
     */
    private $clientId;

    /**
     * @var bool|null $credit
     */
    private $credit;

    /**
     * @var bool|null $oneTime
     */
    private $oneTime;

    /**
     * @var int|null $vendorId
     */
    private $vendorId;

    /**
     * @var int|null $businessUnitId
     */
    private $businessUnitId;

    /**
     * @var bool $tax
     */
    private $tax;


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
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
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
     * @return ChartDashboardFilter
     */
    public function setClientId(int $clientId): ChartDashboardFilter
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCredit():? bool
    {
        return $this->credit;
    }

    /**
     * @param bool|null $credit
     * @return $this
     */
    public function setCredit(?bool $credit): ChartDashboardFilter
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOneTime():? bool
    {
        return $this->oneTime;
    }

    /**
     * @param bool|null $oneTime
     * @return $this
     */
    public function setOneTime(?bool $oneTime): ChartDashboardFilter
    {
        $this->oneTime = $oneTime;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVendorId(): ?int
    {
        return $this->vendorId;
    }

    /**
     * @param int|null $vendorId
     * @return $this
     */
    public function setVendorId(?int $vendorId): ChartDashboardFilter
    {
        $this->vendorId = $vendorId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBusinessUnitId(): ?int
    {
        return $this->businessUnitId;
    }

    /**
     * @param int|null $businessUnitId
     * @return $this
     */
    public function setBusinessUnitId(?int $businessUnitId): ChartDashboardFilter
    {
        $this->businessUnitId = $businessUnitId;

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
     *
     * @return ChartDashboardFilter
     */
    public function setTax(bool $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

}
