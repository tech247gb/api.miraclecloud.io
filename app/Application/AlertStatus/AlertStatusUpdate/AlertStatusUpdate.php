<?php

declare(strict_types = 1);

namespace App\Application\AlertStatus\AlertStatusUpdate;


use App\Application\Core\CommandBase;
use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\UnprocessableCommandException;

/**
 * Class AlertStatusUpdate
 * @package App\Application\AlertStatus\AlertStatusUpdate
 *
 * @property int|null $alertId
 * @property int|null $statusId
 * @property int|null $reasonId
 * @property int|null $userId
 */
class AlertStatusUpdate extends CommandBase
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
     * @return AlertStatusUpdate
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
     * @return AlertStatusUpdate
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
     * @return AlertStatusUpdate
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
     * @return AlertStatusUpdate
     */
    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return bool
     *
     * @throws UnprocessableCommandException
     */
    public function validateCommand(): bool
    {
        if (
            is_null($this->alertId)
            || is_null($this->statusId)
            || is_null($this->reasonId)
            || is_null($this->userId)
        ) {

            throw UnprocessableCommandException::getClass(
                CustomExceptionCodeInterface::ALERT_STATUS_UPDATE_COMMAND
            );
        }

        return true;
    }

}
