<?php


namespace App\Contract\CommandBus\DashboardTable;


use App\Contract\CommandBus\CommandInterface;

interface DashboardTableCommandInterface extends CommandInterface
{
    /**
     * @return int
     */
    public function getClientId(): int;

    /**
     * @return string
     */
    public function getStartDate(): string;

    /**
     * @return string
     */
    public function getEndDate(): string;

    /**
     * @return string|null
     */
    public function getDateInterval(): ?string;

    /**
     * @return array|null
     */
    public function getFields(): ?array;

    /**
     * @return array|null
     */
    public function getFilters(): ?array;

    /**
     * @return int
     */
    public function getPage(): int;

    /**
     * @return int
     */
    public function getPerPage(): int;

    /**
     * @param int $clientId
     * @return $this
     */
    public function setClientId(int $clientId): self;

    /**
     * @param string $startDate
     * @return $this
     */
    public function setStartDate(string $startDate): self;

    /**
     * @param string $endDate
     * @return $this
     */
    public function setEndDate(string $endDate): self;

    /**
     * @param string|null $dateInterval
     * @return $this
     */
    public function setDateInterval(?string $dateInterval): self;

    /**
     * @param array|null $filters
     * @return $this
     */
    public function setFilters(?array $filters): self;

    /**
     * @param array|null $fields
     * @return $this
     */
    public function setFields(?array $fields): self;

    /**
     * @param int $page
     * @return $this
     */
    public function setPage(int $page): self;

    /**
     * @param int $perPage
     * @return $this
     */
    public function setPerPage(int $perPage): self;

}
