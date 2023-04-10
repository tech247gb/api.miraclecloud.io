<?php

namespace App\Domain\ChartDashboard;

/**
 * Interface DashboardRepositoryInterface
 * @package App\Domain\Dashboard
 */
interface ChartDashboardRepositoryInterface
{
    /**
     * @param ChartDashboardFilter $filter
     * @return array
     */
    public function all(ChartDashboardFilter $filter): array;

    /**
     * @return ChartDashboardFilter
     */
    public function getChartDashboardRepositoryFilter(): ChartDashboardFilter;
}
