<?php

namespace App\Contract\CommandBus\Dashboard;

use App\Contract\CommandBus\CommandInterface;

/**
 * Interface CommandInterface
 * @package App\Contract\Core
 */
interface GridDashboardCommandInterface extends CommandInterface
{
    /**
     * @return int
     */
    public function getPage(): int;

    /**
     * @param int $page
     * @return self
     */
    public function setPage(?int $page): self;

    /**
     * @return int
     */
    public function getPerPage(): int;

    /**
     * @param int $perPage
     * @return self
     */
    public function setPerPage(?int $perPage): self;

    /**
     * @return string|null
     */
    public function getPath(): ?string;

    /**
     * @param null|string $path
     * @return self
     */
    public function setPath(?string $path): self;
    /**
     * @return array
     */
    public function getDivision(): array;

    /**
     * @param array|null $division
     * @return self
     */
    public function setDivision(?array $division): self;

    /**
     * @return array
     */
    public function getProvider(): array;

    /**
     * @param array|null $provider
     * @return self
     */
    public function setProvider(?array $provider): self;

    /**
     * @return int|null
     */
    public function getMonth(): ?int;

    /**
     * @param int|null $month
     * @return $this
     */
    public function setMonth(?int $month): self;

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
     * @return bool
     */
    public function getCredit(): bool;

    /**
     * @param bool $credit
     * @return self
     */
    public function setCredit(bool $credit): self;

    /**
     * @return bool
     */
    public function getOneTime(): bool;

    /**
     * @param bool $oneTime
     * @return self
     */
    public function setOneTime(bool $oneTime): self;

    /**
     * @return int|null
     */
    public function getClientId(): ?int;

    /**
     * @param int|null $clientId
     * @return $this
     */
    public function setClientId(?int $clientId): self;

    /**
     * @return bool
     */
    public function getTax(): bool;

    /**
     * @param bool $tax
     * @return $this
     */
    public function setTax(bool $tax): self;
}
