<?php


namespace App\Application\Alert\AlertUnSuspend;


use App\Application\Core\CommandBase;

class AlertUnSuspend extends CommandBase
{

    /**
     * @var int
     */
    private $alertId;

    /**
     * @return int
     */
    public function getAlertId(): int
    {
        return $this->alertId;
    }

    /**
     * @param int $alertId
     * @return AlertUnSuspend
     */
    public function setAlertId(int $alertId): self
    {
        $this->alertId = $alertId;

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
