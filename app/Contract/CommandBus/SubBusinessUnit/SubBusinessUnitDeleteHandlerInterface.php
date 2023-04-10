<?php


namespace App\Contract\CommandBus\SubBusinessUnit;

/**
 * Interface SubBusinessUnitDeleteHandlerInterface
 * @package App\Contract\CommandBus\SubBusinessUnit
 */
interface SubBusinessUnitDeleteHandlerInterface
{

    /**
     * @param SubBusinessUnitDeleteCommandInterface $command
     */
    public function work(SubBusinessUnitDeleteCommandInterface $command): void;

}
