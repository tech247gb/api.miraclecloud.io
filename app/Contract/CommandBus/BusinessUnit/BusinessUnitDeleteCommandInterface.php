<?php


namespace App\Contract\CommandBus\BusinessUnit;


use App\Contract\CommandBus\CommandInterface;

interface BusinessUnitDeleteCommandInterface extends CommandInterface
{

    /**
     * @return int
     */
    public function getBusinessUnitId(): int;

}
