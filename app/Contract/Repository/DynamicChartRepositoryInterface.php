<?php


namespace App\Contract\Repository;


use App\Domain\DynamicChart\DynamicChartFilter;

interface DynamicChartRepositoryInterface
{
    /**
     * @return DynamicChartFilter
     */
    public function getDynamicChartFilter(): DynamicChartFilter;

    /**
     * @param DynamicChartFilter $filter
     * @return array
     */
    public function getDynamicChartData(DynamicChartFilter $filter): array;

}
