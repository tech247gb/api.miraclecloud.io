<?php


namespace App\Contract\CommandBus\BusinessUnit;

/**
 * Interface BusinessUnitDeleteHandlerInterface
 * @package App\Contract\CommandBus\BusinessUnit
 */
interface BusinessUnitDeleteHandlerInterface
{

    /**
     * @param BusinessUnitDeleteCommandInterface $command
     * @return bool
     */
    public function work(BusinessUnitDeleteCommandInterface $command): void;

}
