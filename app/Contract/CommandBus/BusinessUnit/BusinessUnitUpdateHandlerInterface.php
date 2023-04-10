<?php


namespace App\Contract\CommandBus\BusinessUnit;


/**
 * Interface BusinessUnitUpdateHandlerInterface
 * @package App\Contract\CommandBus\BusinessUnit
 */
interface BusinessUnitUpdateHandlerInterface
{

    /**
     * @param BusinessUnitUpdateCommandInterface $command
     * @return bool
     */
    public function work(BusinessUnitUpdateCommandInterface $command): void;

}
