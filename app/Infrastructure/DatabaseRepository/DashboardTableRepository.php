<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\DashboardTableRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\DashboardTable\DashboardTableFilter;
use Illuminate\Database\Eloquent\Builder;

class DashboardTableRepository implements DashboardTableRepositoryInterface
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
     * @return DashboardTableFilter
     */
    public function getDashboardTableFilter(): DashboardTableFilter
    {
        return new DashboardTableFilter();
    }

    /**
     * @param DashboardTableFilter $filter
     * @return array
     */
    public function getDashboardTableData(DashboardTableFilter $filter): array
    {
        return $this->model->getDashboardTableData($this->dashboardTableFilter($filter))->all();
    }

    /**
     * @param DashboardTableFilter $filter
     * @return array
     */
    private function dashboardTableFilter(DashboardTableFilter $filter): array
    {
        return [
            $filter->getClientId(),
            $filter->getStartDate(),
            $filter->getEndDate(),
            $filter->getDateInterval(),
            $filter->getFields(),
            $filter->getFilters(),
            $filter->getPage(),
            $filter->getPerPage()
        ];
    }

}
