<?php

namespace App\Infrastructure\DatabaseRepository;

use App\Contract\Core\PaginationInterface;
use App\Domain\Dashboard\DashboardFilter;
use App\Domain\Dashboard\DashboardRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class DashboardRepository
 * @package App\Infrastructure\DatabaseRepository
 */
class DashboardRepository implements DashboardRepositoryInterface
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
     * @param DashboardFilter $filter
     * @param PaginationInterface $paginator
     * @return LengthAwarePaginator
     */
    public function allPagination(DashboardFilter $filter, PaginationInterface $paginator): LengthAwarePaginator
    {
        $builder = array_merge(
            $this->filter($filter),
            [
                $paginator->getPage(),
                $paginator->getPerPage()
            ]
        );
        $gridItems = $this->model->dashboardGrid($builder)->all();
        $count = count($gridItems);

        return new LengthAwarePaginator(
            $gridItems,
            $count,
            $paginator->getPerPage(),
            $paginator->getPage(),
            [
                'path' => $paginator->getPath(),
                'query' => [
                    'page' => $paginator->getPage(),
                    'per_page' => $paginator->getPerPage(),
                ]
            ]
        );
    }

    /**
     * @param DashboardFilter $filter
     * @return array
     */
    private function filter(DashboardFilter $filter):array
    {
        return [
            $filter->getClientId(),
            $filter->getDivision(),
            $filter->getProvider(),
            $filter->getMonth(),
            $filter->getYear(),
            $filter->getCredit(),
            $filter->getOneTime(),
            $filter->getTax(),
        ];
    }

    public function getDashboardRepositoryFilter(): DashboardFilter
    {
        return new DashboardFilter();
    }
}
