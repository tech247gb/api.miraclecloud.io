<?php

declare(strict_types = 1);

namespace App\Domain\AlertStatus;


/**
 * Class AlertStatus
 * @package App\Domain\AlertStatus
 *
 * @property int|null $alertStatusId
 * @property string|null $statusName
 */
class AlertStatus
{

    /**
     * @var int|null
     */
    private $alertStatusId;

    /**
     * @var string|null
     */
    private $statusName;

    /**
     * @return int|null
     */
    public function getAlertStatusId(): ?int
    {
        return $this->alertStatusId;
    }

    /**
     * @param int|null $alertStatusId
     *
     * @return AlertStatus
     */
    public function setAlertStatusId(?int $alertStatusId): self
    {
        $this->alertStatusId = $alertStatusId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatusName(): ?string
    {
        return $this->statusName;
    }

    /**
     * @param string|null $statusName
     *
     * @return AlertStatus
     */
    public function setStatusName(?string $statusName): self
    {
        $this->statusName = $statusName;

        return $this;
    }

}
