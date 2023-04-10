<?php


namespace App\Contract\CommandBus\BusinessUnit;


use App\Domain\BusinessUnit\BusinessUnit;

interface BusinessUnitCreateHandlerInterface
{

    /**
     * @param BusinessUnitCreateCommandInterface $command
     * @return array
     */
    public function work(BusinessUnitCreateCommandInterface $command): BusinessUnit;

}
