<?php


namespace App\Application\Alert\AlertExportExcel;


use App\Application\Core\CommandBase;

class AlertExportExcel extends CommandBase
{
    /**
     * @var int
     */
    private $clientId;

    /**
     * @var array
     */
    private $alertIds;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return AlertExportExcel
     */
    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return array
     */
    public function getAlertIds(): array
    {
        return $this->alertIds;
    }

    /**
     * @param array $alertIds
     * @return AlertExportExcel
     */
    public function setAlertIds(array $alertIds): self
    {
        $this->alertIds = $alertIds;

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
