<?php


namespace App\Application\AlertType\AlertTypeList;


use App\Application\Core\CommandBase;

class AlertTypeList extends CommandBase
{

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
