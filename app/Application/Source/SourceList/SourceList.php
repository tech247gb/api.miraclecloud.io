<?php


namespace App\Application\Source\SourceList;


use App\Application\Core\CommandBase;

class SourceList extends CommandBase
{

    /**
     * @var int
     */
    private $alertTypeId;

    /**
     * @return int
     */
    public function getAlertTypeId(): int
    {
        return $this->alertTypeId;
    }

    /**
     * @param int $alertTypeId
     * @return SourceList
     */
    public function setAlertTypeId(int $alertTypeId): self
    {
        $this->alertTypeId = $alertTypeId;

        return $this;
    }

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
