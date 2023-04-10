<?php


namespace App\Contract\CommandBus\DashboardTable;


interface DashboardTableHandlerInterface
{

    /**
     * @param DashboardTableCommandInterface $command
     * @return array
     */
    public function work(DashboardTableCommandInterface $command): array;

}
