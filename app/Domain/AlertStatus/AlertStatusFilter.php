<?php

declare(strict_types = 1);

namespace App\Domain\AlertStatus;


/**
 * Class AlertStatusFilter
 * @package App\Domain\AlertStatus
 *
 * @property int|null $alertId
 * @property int|null $statusId
 * @property int|null $reasonId
 * @property int|null $userId
 *
 */
class AlertStatusFilter
{

    /**
     * @var int|null
     */
    private $alertId;

    /**
     * @var int|null
     */
    private $statusId;

    /**
     * @var int|null
     */
    private $reasonId;

    /**
     * @var int|null
     */
    private $userId;

    /**
     * @return int|null
     */
    public function getAlertId(): ?int
    {
        return $this->alertId;
    }

    /**
     * @param int|null $alertId
     *
     * @return AlertStatusFilter
     */
    public function setAlertId(?int $alertId): self
    {
        $this->alertId = $alertId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    /**
     * @param int|null $statusId
     *
     * @return AlertStatusFilter
     */
    public function setStatusId(?int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReasonId(): ?int
    {
        return $this->reasonId;
    }

    /**
     * @param int|null $reasonId
     *
     * @return AlertStatusFilter
     */
    public function setReasonId(?int $reasonId): self
    {
        $this->reasonId = $reasonId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     *
     * @return AlertStatusFilter
     */
    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

}
