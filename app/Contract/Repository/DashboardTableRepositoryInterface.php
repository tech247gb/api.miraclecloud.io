<?php


namespace App\Contract\Repository;


use App\Domain\DashboardTable\DashboardTableFilter;

interface DashboardTableRepositoryInterface
{

    /**
     * @return DashboardTableFilter
     */
    public function getDashboardTableFilter(): DashboardTableFilter;

    /**
     * @param DashboardTableFilter $filter
     * @return array
     */
    public function getDashboardTableData(DashboardTableFilter $filter): array;

}
