<?php


namespace App\Contract\CommandBus\SubBusinessUnit;


use App\Contract\CommandBus\CommandInterface;

interface SubBusinessUnitCreateCommandInterface extends CommandInterface
{

    /**
     * @return int
     */
    public function getBusinessUnitId(): int;

    /**
     * @return string
     */
    public function getSubBusinessUnitName(): string;

}
