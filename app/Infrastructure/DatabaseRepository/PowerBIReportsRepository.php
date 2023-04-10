<?php

namespace App\Infrastructure\DatabaseRepository;

use App\Contract\Repository\PowerBIRepositoryInterface;
use App\Domain\ChartDashboard\ChartDashboardFilter;
use App\Domain\ChartDashboard\ChartDashboardRepositoryInterface;
use App\Domain\Dashboard\DashboardFilter;
use App\Domain\Dashboard\DbModel;
use App\Domain\PowerBI\Report;
use App\Domain\PowerBI\ReportFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Class ChartDashboardRepository
 * @package App\Infrastructure\DatabaseRepository
 */
class PowerBIReportsRepository implements PowerBIRepositoryInterface
{
    /** @var Builder $model */
    private $model;

    /**
     * DashboardRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param ReportFilter $filter
     * @return Collection
     */
    public function all(ReportFilter $filter): Collection
    {
        return $this->mapCollection($this->model->getReportList($this->filter($filter)));
    }

    private function mapCollection(Collection $collection): Collection
    {
        return $collection->map(function ($report) {
            $reportModel = new Report();
            $reportModel->setGroupId($report->MenuItemGrouID);
            $reportModel->setMain($report->IMainReport);
            $reportModel->setReportId($report->MenuItemReportID);
            $reportModel->setTitle($report->MenuItemTitle);
            $reportModel->setType($report->MenuItemType);
            $reportModel->setDashboardType($report->DashboardType);
            $reportModel->setDashboardID($report->DashboardID);
            $reportModel->setFilter($report->Filter);

            return $reportModel;
        });
    }

    /**
     * @param ReportFilter $filter
     * @return array
     */
    private function filter(ReportFilter $filter)
    {
        return [
            $filter->getUser()->id
        ];
    }

    /**
     * @return ReportFilter
     */
    public function getFilter(): ReportFilter
    {
        return new ReportFilter();
    }
}
