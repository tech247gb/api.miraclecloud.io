<?php


namespace App\Contract\CommandBus\SubBusinessUnit;

/**
 * Interface SubBusinessUnitUpdateHandlerInterface
 * @package App\Contract\CommandBus\SubBusinessUnit
 */
interface SubBusinessUnitUpdateHandlerInterface
{

    /**
     * @param SubBusinessUnitUpdateCommandInterface $command
     */
    public function work(SubBusinessUnitUpdateCommandInterface $command): void;

}
