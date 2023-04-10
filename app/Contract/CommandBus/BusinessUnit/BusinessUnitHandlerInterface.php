<?php

namespace App\Contract\CommandBus\BusinessUnit;

/**
 * Interface BusinessUnitHandlerInterface
 * @package App\Contract\CommandBus\BusinessUnit
 */
interface BusinessUnitHandlerInterface
{
    /**
     * @param BusinessUnitCommandInterface $command
     * @return array
     */
    public function work(BusinessUnitCommandInterface $command): array;
}
