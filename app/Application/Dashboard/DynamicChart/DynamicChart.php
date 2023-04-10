<?php


namespace App\Application\Dashboard\DynamicChart;


use App\Contract\CommandBus\DynamicChart\DynamicChartCommandInterface;
use App\Contract\CommandBus\CommandInterface;

class DynamicChart implements DynamicChartCommandInterface
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
     * @return DynamicChartCommandInterface
     */
    public function setClientId(int $clientId): DynamicChartCommandInterface
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
     * @return DynamicChartCommandInterface
     */
    public function setStartDate(string $startDate): DynamicChartCommandInterface
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
     * @return DynamicChartCommandInterface
     */
    public function setEndDate(string $endDate): DynamicChartCommandInterface
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
     * @return DynamicChartCommandInterface
     */
    public function setDateInterval(?string $dateInterval): DynamicChartCommandInterface
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
     * @return DynamicChartCommandInterface
     */
    public function setFields(?array $fields): DynamicChartCommandInterface
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
     * @return DynamicChartCommandInterface
     */
    public function setFilters(?array $filters): DynamicChartCommandInterface
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
     * @return DynamicChartCommandInterface
     */
    public function setPage(int $page): DynamicChartCommandInterface
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
     * @return DynamicChartCommandInterface
     */
    public function setPerPage(int $perPage): DynamicChartCommandInterface
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
