<?php


namespace App\Contract\CommandBus\SubBusinessUnit;


use App\Contract\CommandBus\CommandInterface;

/**
 * Interface SubBusinessUnitDeleteCommandInterface
 * @package App\Contract\CommandBus\SubBusinessUnit
 */
interface SubBusinessUnitDeleteCommandInterface extends CommandInterface
{

    /**
     * @return int
     */
    public function getSubBusinessUnitId(): int;

}
