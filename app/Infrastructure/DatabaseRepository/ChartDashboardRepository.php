<?php

namespace App\Infrastructure\DatabaseRepository;

use App\Domain\ChartDashboard\ChartDashboardFilter;
use App\Domain\ChartDashboard\ChartDashboardRepositoryInterface;
use App\Domain\Dashboard\DashboardFilter;
use App\Domain\Dashboard\DbModel;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ChartDashboardRepository
 * @package App\Infrastructure\DatabaseRepository
 */
class ChartDashboardRepository implements ChartDashboardRepositoryInterface
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
     * @param ChartDashboardFilter $filter
     * @return array
     */
    public function all(ChartDashboardFilter $filter): array
    {
        return $this->model->clientReportChartSelect($this->filter($filter))->all();
    }

    /**
     * @param ChartDashboardFilter $filter
     * @return array
     */
    private function filter(ChartDashboardFilter $filter)
    {
        return [
            $filter->getYear(),
            $filter->getClientId(),
            $filter->getCredit(),
            $filter->getOneTime(),
            $filter->getTax()
        ];
    }

    /**
     * @return ChartDashboardFilter
     */
    public function getChartDashboardRepositoryFilter(): ChartDashboardFilter
    {
        return new ChartDashboardFilter();
    }
}
