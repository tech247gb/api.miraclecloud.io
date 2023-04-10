<?php

declare(strict_types = 1);

namespace App\Domain\StatusReason;


/**
 * Class StatusReasonFilter
 * @package App\Domain\StatusReason
 *
 * @property int|null $statusId
 */
class StatusReasonFilter
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
     * @return StatusReasonFilter
     */
    public function setStatusId(?int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

}
