<?php


namespace App\Application\DashboardTable;


use App\Application\HandlerBase;
use App\Contract\CommandBus\DashboardTable\DashboardTableCommandInterface;
use App\Contract\CommandBus\DashboardTable\DashboardTableHandlerInterface;
use App\Contract\Repository\DashboardTableRepositoryInterface;
use App\Domain\DashboardTable\DashboardTableFilter;

/**
 * Class DashboardTableHandler
 * @package App\Application\DashboardTable
 *
 * @property DashboardTableRepositoryInterface $dashboardTableRepository
 */
class DashboardTableHandler extends HandlerBase implements DashboardTableHandlerInterface
{

    /**
     * @var DashboardTableRepositoryInterface $dashboardTableRepository
     */
    private $dashboardTableRepository;

    /**
     * DashboardTableHandler constructor.
     * @param DashboardTableRepositoryInterface $dashboardTableRepository
     */
    public function __construct(DashboardTableRepositoryInterface $dashboardTableRepository)
    {
        $this->dashboardTableRepository = $dashboardTableRepository;
    }

    /**
     * @param DashboardTableCommandInterface $command
     * @return array
     */
    public function work(DashboardTableCommandInterface $command): array
    {
        return $this->dashboardTableRepository->getDashboardTableData(
            $this->createDashboardTableFilter($command)
        );
    }

    /**
     * @param DashboardTableCommandInterface $command
     * @return DashboardTableFilter
     */
    private function createDashboardTableFilter(DashboardTableCommandInterface $command): DashboardTableFilter
    {
        return $this->dashboardTableRepository
            ->getDashboardTableFilter()
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
