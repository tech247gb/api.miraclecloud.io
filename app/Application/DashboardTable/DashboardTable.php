<?php


namespace App\Application\DashboardTable;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\DashboardTable\DashboardTableCommandInterface;

class DashboardTable implements DashboardTableCommandInterface
{

    /**
     * @var int
     */
    private $clientId;

    /**
     * @var string
     */
    private $startDate;

    /**
     * @var string
     */
    private $endDate;

    /**
     * @var string
     */
    private $dateInterval;

    /**
     * @var array
     */
    private $fields;

    /**
     * @var array
     */
    private $filters;

    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $perPage;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return DashboardTableCommandInterface
     */
    public function setClientId(int $clientId): DashboardTableCommandInterface
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return DashboardTableCommandInterface
     */
    public function setStartDate(string $startDate): DashboardTableCommandInterface
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return DashboardTableCommandInterface
     */
    public function setEndDate(string $endDate): DashboardTableCommandInterface
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDateInterval(): ?string
    {
        return $this->dateInterval;
    }

    /**
     * @param string|null $dateInterval
     * @return DashboardTableCommandInterface
     */
    public function setDateInterval(?string $dateInterval): DashboardTableCommandInterface
    {
        $this->dateInterval = $dateInterval;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @param array|null $fields
     * @return DashboardTableCommandInterface
     */
    public function setFields(?array $fields): DashboardTableCommandInterface
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getFilters(): ?array
    {
        return $this->filters;
    }

    /**
     * @param array|null $filters
     * @return DashboardTableCommandInterface
     */
    public function setFilters(?array $filters): DashboardTableCommandInterface
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return DashboardTableCommandInterface
     */
    public function setPage(int $page): DashboardTableCommandInterface
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return DashboardTableCommandInterface
     */
    public function setPerPage(int $perPage): DashboardTableCommandInterface
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     * @return self
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }

}
