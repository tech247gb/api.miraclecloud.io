<?php


namespace App\Contract\CommandBus\SubBusinessUnit;


use App\Contract\CommandBus\CommandInterface;

/**
 * Interface SubBusinessUnitUpdateCommandInterface
 * @package App\Contract\CommandBus\SubBusinessUnit
 */
interface SubBusinessUnitUpdateCommandInterface extends CommandInterface
{

    /**
     * @return int
     */
    public function getSubBusinessUnitId(): int;

    /**
     * @return string
     */
    public function getSubBusinessUnitName(): string;

}
