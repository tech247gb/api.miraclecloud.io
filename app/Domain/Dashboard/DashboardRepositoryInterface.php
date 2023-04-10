<?php

namespace App\Domain\Dashboard;

use App\Contract\Core\PaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface DashboardRepositoryInterface
 * @package App\Domain\Dashboard
 */
interface DashboardRepositoryInterface
{
    /**
     * @param DashboardFilter $filter
     * @param PaginationInterface $paginator
     * @return LengthAwarePaginator
     */
    public function allPagination(DashboardFilter $filter, PaginationInterface $paginator): LengthAwarePaginator;

    /**
     * @return DashboardFilter
     */
    public function getDashboardRepositoryFilter(): DashboardFilter;
}
