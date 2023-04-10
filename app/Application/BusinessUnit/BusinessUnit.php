<?php

namespace App\Application\BusinessUnit;

use App\Contract\CommandBus\BusinessUnit\BusinessUnitCommandInterface;
use App\Contract\CommandBus\CommandInterface;

/**
 * Class BusinessUnit
 * @package App\Application\Dashboard\BusinessUnit
 */
class BusinessUnit implements BusinessUnitCommandInterface
{

    /**
     * @return self
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }

}
