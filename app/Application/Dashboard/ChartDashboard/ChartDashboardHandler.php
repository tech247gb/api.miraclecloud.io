<?php

namespace App\Application\Dashboard\ChartDashboard;

use App\Application\HandlerBase;
use App\Contract\CommandBus\ChartDashboard\ChartDashboardCommandInterface;
use App\Contract\CommandBus\ChartDashboard\ChartDashboardHandlerInterface;
use App\Domain\ChartDashboard\ChartDashboardFilter;
use App\Domain\ChartDashboard\ChartDashboardHelper;
use App\Domain\ChartDashboard\ChartDashboardRepositoryInterface;

/**
 * Class ChartDashboardHandler
 * @package App\Application\Dashboard
 *
 * @property ChartDashboardRepositoryInterface $chartDashboardRepository
 */
class ChartDashboardHandler extends HandlerBase implements ChartDashboardHandlerInterface
{
    /** @var ChartDashboardRepositoryInterface $DashboardRepository */
    private $chartDashboardRepository;

    /**
     * ChartDashboardHandler constructor.
     * @param ChartDashboardRepositoryInterface $chartDashboardRepository
     */
    public function __construct(ChartDashboardRepositoryInterface $chartDashboardRepository)
    {
        $this->chartDashboardRepository = $chartDashboardRepository;
    }

    /**
     * @param ChartDashboardCommandInterface $command
     * @return array
     */
    public function work(ChartDashboardCommandInterface $command): array
    {
        return ChartDashboardHelper::GroupData(
            $this->chartDashboardRepository->all(
                $this->createFilterWithPropertiesData($command)
            ),
            $command
        );
    }

    /**
     * @param ChartDashboardCommandInterface $command
     * @return ChartDashboardFilter
     */
    private function createFilterWithPropertiesData(ChartDashboardCommandInterface $command): ChartDashboardFilter
    {
        return $this->chartDashboardRepository
            ->getChartDashboardRepositoryFilter()
            ->setYear($command->getYear())
            ->setClientId($command->getClientId())
            ->setCredit($command->getCredit())
            ->setOneTime($command->getOneTime())
            ->setVendorId($command->getVendorId())
            ->setTax($command->getTax())
            ->setBusinessUnitId($command->getBusinessUnitId());
    }
}
