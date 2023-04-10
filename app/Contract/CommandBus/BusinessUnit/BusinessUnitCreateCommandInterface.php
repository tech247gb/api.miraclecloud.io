<?php


namespace App\Contract\CommandBus\BusinessUnit;


use App\Contract\CommandBus\CommandInterface;

/**
 * Interface BusinessUnitCreateCommandInterface
 * @package App\Contract\CommandBus\BusinessUnit
 */
interface BusinessUnitCreateCommandInterface extends CommandInterface
{

    /**
     * @return int
     */
    public function getClientId(): int;

    /**
     * @return string
     */
    public function getBusinessUnitName(): string;

}
