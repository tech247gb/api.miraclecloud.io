<?php


namespace App\Application\ComparisonType\ComparisonTypeList;


use App\Application\Core\CommandBase;

class ComparisonTypeList extends CommandBase
{
    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
