<?php


namespace App\Application\Dashboard\DynamicChart;


use App\Application\HandlerBase;
use App\Contract\CommandBus\DynamicChart\DynamicChartCommandInterface;
use App\Contract\CommandBus\DynamicChart\DynamicChartHandlerInterface;
use App\Contract\Repository\DynamicChartRepositoryInterface;
use App\Domain\DynamicChart\DynamicChartFilter;

/**
 * Class DynamicChartHandler
 * @package App\Application\Dashboard\DynamicChart
 *
 * @property DynamicChartRepositoryInterface $dynamicChartRepository
 */
class DynamicChartHandler extends HandlerBase implements DynamicChartHandlerInterface
{

    /**
     * @var DynamicChartRepositoryInterface $dynamicChartRepository
     */
    private $dynamicChartRepository;

    /**
     * DynamicChartHandler constructor.
     * @param DynamicChartRepositoryInterface $dynamicChartRepository
     */
    public function __construct(DynamicChartRepositoryInterface $dynamicChartRepository)
    {
        $this->dynamicChartRepository = $dynamicChartRepository;
    }

    /**
     * @param DynamicChartCommandInterface $command
     * @return array
     */
    public function work(DynamicChartCommandInterface $command): array
    {
        return $this->dynamicChartRepository->getDynamicChartData(
            $this->createDynamicChartFilter($command)
        );
    }

    /**
     * @param DynamicChartCommandInterface $command
     * @return DynamicChartFilter
     */
    private function createDynamicChartFilter(DynamicChartCommandInterface $command): DynamicChartFilter
    {
        return $this->dynamicChartRepository
            ->getDynamicChartFilter()
            ->setClientId($command->getClientId())
            ->setStartDate($command->getStartDate())
            ->setEndDate($command->getEndDate())
            ->setDateInterval($command->getDateInterval())
            ->setFilters($command->getFilters())
            ->setFields($command->getFields())
            ->setPage($command->getPage())
            ->setPerPage($command->getPerPage());
    }

}
