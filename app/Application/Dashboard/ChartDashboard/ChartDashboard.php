<?php

namespace App\Application\Dashboard\ChartDashboard;

use App\Contract\CommandBus\ChartDashboard\ChartDashboardCommandInterface;
use App\Contract\CommandBus\CommandInterface;

/**
 * Class ChartDashboard
 * @package App\Application\Dashboard\ChartDashboard
 */
class ChartDashboard implements ChartDashboardCommandInterface
{
    /**
     * @var int $year
     */
    private $year;
    /**
     * @var int $year
     */
    private $clientId;
    /**
     * @var bool|null
     */
    private $credit;
    /**
     * @var int|null
     */
    private $businessUnitId;
    /**
     * @var bool|null
     */
    private $oneTime;
    /**
     * @var int|null
     */
    private $vendorId;
    /**
     * @var bool
     */
    private $tax;

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return ChartDashboardCommandInterface
     */
    public function setYear(int $year): ChartDashboardCommandInterface
    {
        $this->year = $year;

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
     * @return ChartDashboardCommandInterface
     */
    public function setClientId(int $clientId): ChartDashboardCommandInterface
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return self
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }

    /**
     * @inheritDoc
     */
    public function getVendorId(): ?int
    {
        return $this->vendorId;
    }

    /**
     * @inheritDoc
     */
    public function setVendorId(?int $vendorId): ChartDashboardCommandInterface
    {
        $this->vendorId = $vendorId;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOneTime(): ?bool
    {
        return $this->oneTime;
    }

    /**
     * @param bool|null $oneTime
     * @return ChartDashboardCommandInterface
     */
    public function setOneTime(?bool $oneTime): ChartDashboardCommandInterface
    {
        $this->oneTime = $oneTime;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getBusinessUnitId(): ?int
    {
        return $this->businessUnitId;
    }

    /**
     * @param int|null $businessUnitId
     * @return ChartDashboardCommandInterface
     */
    public function setBusinessUnitId(?int $businessUnitId): ChartDashboardCommandInterface
    {
        $this->businessUnitId = $businessUnitId;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCredit(): ?bool
    {
        return $this->credit;
    }

    /**
     * @param bool|null $credit
     * @return ChartDashboardCommandInterface
     */
    public function setCredit(?bool $credit): ChartDashboardCommandInterface
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTax(): ?bool
    {
        return $this->tax;
    }

    /**
     * @param bool $tax
     * @return ChartDashboardCommandInterface
     */
    public function setTax(bool $tax): ChartDashboardCommandInterface
    {
        $this->tax = $tax;

        return $this;
    }
}
