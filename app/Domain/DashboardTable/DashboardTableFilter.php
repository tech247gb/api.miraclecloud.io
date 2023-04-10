<?php


namespace App\Domain\DashboardTable;


class DashboardTableFilter
{

    /**
     * @var int|null
     */
    private $clientId;

    /**
     * @var string|null
     */
    private $startDate;

    /**
     * @var string|null
     */
    private $endDate;

    /**
     * @var string|null
     */
    private $dateInterval;

    /**
     * @var string|null
     */
    private $fields;

    /**
     * @var string|null
     */
    private $filters;

    /**
     * @var int|null
     */
    private $page;

    /**
     * @var int|null
     */
    private $perPage;

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $clientId
     * @return DashboardTableFilter
     */
    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    /**
     * @param string|null $startDate
     * @return DashboardTableFilter
     */
    public function setStartDate(?string $startDate): self
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
     * @return DashboardTableFilter
     */
    public function setEndDate(string $endDate): self
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
     * @return DashboardTableFilter
     */
    public function setDateInterval(?string $dateInterval): self
    {
        $this->dateInterval = $dateInterval;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFields(): ?string
    {
        return $this->fields;
    }

    /**
     * @param array|null $fields
     * @return DashboardTableFilter
     */
    public function setFields(?array $fields): self
    {
        if (!empty($fields)) {

            $this->fields = implode(',', $fields);
        }


        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilters(): ?string
    {
        return $this->filters;
    }

    /**
     * @param array|null $filters
     * @return DashboardTableFilter
     */
    public function setFilters(?array $filters): self
    {
        if (!empty($filters)) {

            $this->filters = implode(',', $filters);
        }

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @param int|null $page
     * @return DashboardTableFilter
     */
    public function setPage(?int $page): self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    /**
     * @param int|null $perPage
     * @return DashboardTableFilter
     */
    public function setPerPage(?int $perPage): self
    {
        $this->perPage = $perPage;

        return $this;
    }

}
