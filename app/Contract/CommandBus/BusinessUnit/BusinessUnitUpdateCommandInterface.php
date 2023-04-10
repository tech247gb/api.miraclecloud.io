<?php


namespace App\Contract\CommandBus\BusinessUnit;


use App\Contract\CommandBus\CommandInterface;

/**
 * Interface BusinessUnitUpdateCommandInterface
 * @package App\Contract\CommandBus\BusinessUnit
 */
interface BusinessUnitUpdateCommandInterface extends CommandInterface
{

    /**
     * @return int
     */
    public function getBusinessUnitId(): int;

    /**
     * @return string
     */
    public function getBusinessUnitName(): string;

}
