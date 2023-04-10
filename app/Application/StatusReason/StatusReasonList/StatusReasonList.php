<?php

declare(strict_types = 1);

namespace App\Application\StatusReason\StatusReasonList;


use App\Application\Core\CommandBase;
use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\UnprocessableCommandException;

/**
 * Class StatusReasonList
 * @package App\Application\StatusReason\StatusReasonList
 *
 * @property int|null $statusId
 */
class StatusReasonList extends CommandBase
{

    /**
     * @var int|null
     */
    private $statusId;

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
     * @return StatusReasonList
     */
    public function setStatusId(?int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * @return bool
     *
     * @throws UnprocessableCommandException
     */
    public function validateCommand(): bool
    {
        if (is_null($this->statusId)) {

            throw UnprocessableCommandException::getClass(
                CustomExceptionCodeInterface::STATUS_REASON_LIST_COMMAND
            );
        }

        return true;
    }

}
