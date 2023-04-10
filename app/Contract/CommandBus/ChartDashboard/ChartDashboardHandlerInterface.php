<?php

namespace App\Contract\CommandBus\ChartDashboard;

/**
 * Interface ChartDashboardHandlerInterface
 * @package App\Contract\CommandBus\Dashboard
 */
interface ChartDashboardHandlerInterface
{
    /**
     * @param ChartDashboardCommandInterface $command
     * @return array
     */
    public function work(ChartDashboardCommandInterface $command): array;
}
