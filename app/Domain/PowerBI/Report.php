<?php


namespace App\Domain\PowerBI;


class Report
{
    /**
     * @var string|null
     */
    private $title;
    /**
     * @var string|null
     */
    private $group_id;
    /**
     * @var string|null
     */
    private $report_id;
    /**
     * @var string|null
     */
    private $type;
    /**
     * @var string|null
     */
    private $dashboardType;
    /**
     * @var string|null
     */
    private $dashboardID;
    /**
     * @var int|null
     */
    private $main;

    /**
     * @var string|null
     */
    private $filter;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->group_id;
    }

    /**
     * @param string|null $group_id
     */
    public function setGroupId(?string $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return string|null
     */
    public function getReportId(): ?string
    {
        return $this->report_id;
    }

    /**
     * @param string|null $report_id
     */
    public function setReportId(?string $report_id): void
    {
        $this->report_id = $report_id;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getMain(): ?int
    {
        return $this->main;
    }

    /**
     * @param int|null $main
     */
    public function setMain(?int $main): void
    {
        $this->main = $main;
    }

    /**
     * @return string|null
     */
    public function getDashboardType(): ?string
    {
        return $this->dashboardType;
    }

    /**
     * @param string|null $dashboardType
     */
    public function setDashboardType(?string $dashboardType): void
    {
        $this->dashboardType = $dashboardType;
    }

    /**
     * @return string|null
     */
    public function getDashboardID(): ?string
    {
        return $this->dashboardID;
    }

    /**
     * @param string|null $dashboardID
     */
    public function setDashboardID(?string $dashboardID): void
    {
        $this->dashboardID = $dashboardID;
    }

    /**
     * @return string|null
     */
    public function getFilter(): ?string
    {
        return $this->filter;
    }

    /**
     * @param string|null $filter
     * @return Report
     */
    public function setFilter(?string $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

}
