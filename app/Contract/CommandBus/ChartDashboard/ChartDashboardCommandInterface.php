<?php

namespace App\Contract\CommandBus\ChartDashboard;

use App\Contract\CommandBus\CommandInterface;

/**
 * Interface ChartDashboardCommandInterface
 * @package App\Contract\CommandBus\ChartDashboard
 */
interface ChartDashboardCommandInterface extends CommandInterface
{
    /**
     * @return int
     */
    public function getYear(): int;

    /**
     * @param int $year
     * @return self
     */
    public function setYear(int $year): self;

    /**
     * @return int
     */
    public function getClientId(): int;

    /**
     * @param int $clientId
     * @return self
     */
    public function setClientId(int $clientId): self;

    /**
     * @return int|null
     */
    public function getVendorId(): ? int;

    /**
     * @param int|null $vendorId
     * @return self
     */
    public function setVendorId(?int $vendorId): self;

    /**
     * @return bool|null
     */
    public function getOneTime(): ? bool;

    /**
     * @param bool|null $oneTime
     * @return self
     */
    public function setOneTime(?bool $oneTime): self;

    /**
     * @return int|null
     */
    public function getBusinessUnitId(): ? int;

    /**
     * @param int|null $businessUnitId
     * @return self
     */
    public function setBusinessUnitId(?int $businessUnitId): self;

    /**
     * @return bool|null
     */
    public function getCredit(): ? bool;

    /**
     * @param bool|null $credit
     * @return self
     */
    public function setCredit(?bool $credit): self;
}
