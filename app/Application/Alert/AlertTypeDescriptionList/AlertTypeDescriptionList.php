<?php


namespace App\Application\Alert\AlertTypeDescriptionList;


use App\Application\Core\CommandBase;

class AlertTypeDescriptionList extends CommandBase
{

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
