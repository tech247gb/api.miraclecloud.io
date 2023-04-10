<?php


namespace App\Contract\CommandBus\DynamicChart;


interface DynamicChartHandlerInterface
{

    /**
     * @param DynamicChartCommandInterface $command
     * @return array
     */
    public function work(DynamicChartCommandInterface $command): array;

}
