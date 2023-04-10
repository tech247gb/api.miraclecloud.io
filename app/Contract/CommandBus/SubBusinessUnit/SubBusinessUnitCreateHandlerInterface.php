<?php


namespace App\Contract\CommandBus\SubBusinessUnit;


use App\Domain\SubBusinessUnit\SubBusinessUnit;

/**
 * Interface SubBusinessUnitCreateHandlerInterface
 * @package App\Contract\CommandBus\SubBusinessUnit
 */
interface SubBusinessUnitCreateHandlerInterface
{

    /**
     * @param SubBusinessUnitCreateCommandInterface $command
     * @return SubBusinessUnit
     */
    public function work(SubBusinessUnitCreateCommandInterface $command): SubBusinessUnit;

}
