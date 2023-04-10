<?php

namespace App\Application\Dashboard\GridDashboard;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Dashboard\GridDashboardCommandInterface;
use App\Contract\CommandBus\Dashboard\GridDashboardHandlerInterface;
use App\Contract\Core\PaginationInterface;
use App\Domain\Dashboard\DashboardFilter;
use App\Domain\Dashboard\DashboardRepositoryInterface;
use App\Infrastructure\Core\Pagination;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ListDashboardHandler
 * @package App\Application\Dashboard
 *
 * @property DashboardRepositoryInterface $DashboardRepository
 */
class GridDashboardHandler extends HandlerBase implements GridDashboardHandlerInterface
{
    /** @var DashboardRepositoryInterface $DashboardRepository */
    private $DashboardRepository;

    /**
     * ListDashboardHandler constructor.
     * @param DashboardRepositoryInterface $DashboardRepository
     */
    public function __construct(DashboardRepositoryInterface $DashboardRepository)
    {
        $this->DashboardRepository = $DashboardRepository;
    }

    /**
     * @param GridDashboardCommandInterface $command
     * @return LengthAwarePaginator
     */
    public function work(GridDashboardCommandInterface $command): LengthAwarePaginator
    {
        return $this->DashboardRepository->allPagination(
            $this->createFilterWithPropertiesData($command),
            $this->createPagination($command)
        );
    }

    /**
     * @param GridDashboardCommandInterface $command
     * @return DashboardFilter
     */
    private function createFilterWithPropertiesData(GridDashboardCommandInterface $command): DashboardFilter
    {
        return $this->DashboardRepository
            ->getDashboardRepositoryFilter()
            ->setClientId($command->getClientId())
            ->setDivision($command->getDivision())
            ->setProvider($command->getProvider())
            ->setMonth($command->getMonth())
            ->setYear($command->getYear())
            ->setCredit($command->getCredit())
            ->setTax($command->getTax())
            ->setOneTime($command->getOneTime());
    }

    /**
     * @param GridDashboardCommandInterface $command
     * @return PaginationInterface
     */
    private function createPagination(GridDashboardCommandInterface &$command): PaginationInterface
    {
        return (
            new Pagination(
                $command->getPage(),
                $command->getPerPage()
            )
        )->setPath($command->getPath());
    }
}
