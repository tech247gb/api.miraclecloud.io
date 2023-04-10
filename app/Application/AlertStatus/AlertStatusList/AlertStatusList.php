<?php

declare(strict_types = 1);

namespace App\Application\AlertStatus\AlertStatusList;


use App\Application\Core\CommandBase;

/**
 * Class AlertStatusList
 * @package App\Application\AlertStatus\AlertStatusList
 */
class AlertStatusList extends CommandBase
{

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
