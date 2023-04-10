<?php


namespace App\Application\Alert\AlertSuspend;


use App\Application\Core\CommandBase;

class AlertSuspend extends CommandBase
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
     * @return AlertSuspend
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
