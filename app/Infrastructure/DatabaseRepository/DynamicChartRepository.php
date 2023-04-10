<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\DynamicChartRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\DynamicChart\DynamicChartFilter;
use Illuminate\Database\Eloquent\Builder;

class DynamicChartRepository implements DynamicChartRepositoryInterface
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

    public function getDynamicChartFilter(): DynamicChartFilter
    {
        return new DynamicChartFilter();
    }

    /**
     * @param DynamicChartFilter $filter
     * @return array
     */
    public function getDynamicChartData(DynamicChartFilter $filter): array
    {
        return $this->model->getDynamicChartData($this->dynamicChartFilter($filter))->all();
    }

    /**
     * @param DynamicChartFilter $filter
     * @return array
     */
    private function dynamicChartFilter(DynamicChartFilter $filter): array
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
