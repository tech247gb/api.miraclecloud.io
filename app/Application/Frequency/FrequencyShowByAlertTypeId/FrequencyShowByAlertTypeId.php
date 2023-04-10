<?php


namespace App\Application\Frequency\FrequencyShowByAlertTypeId;


use App\Application\Core\CommandBase;

class FrequencyShowByAlertTypeId extends CommandBase
{

    /**
     * @var int
     */
    private $alertTypeId;

    /**
     * @return int
     */
    public function getAlertTypeId()
    {
        return $this->alertTypeId;
    }

    /**
     * @param int $alertTypeId
     * @return FrequencyShowByAlertTypeId
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
