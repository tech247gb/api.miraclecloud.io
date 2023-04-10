<?php

namespace App\Contract\CommandBus\Dashboard;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface ListDashboardHandlerInterface
 * @package App\Contract\CommandBus\Dashboard
 */
interface GridDashboardHandlerInterface
{
    /**
     * @param GridDashboardCommandInterface $command
     * @return LengthAwarePaginator
     */
    public function work(GridDashboardCommandInterface $command): LengthAwarePaginator;
}
