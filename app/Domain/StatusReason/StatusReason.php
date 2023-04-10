<?php

declare(strict_types = 1);

namespace App\Domain\StatusReason;


/**
 * Class StatusReason
 * @package App\Domain\StatusReason
 *
 * @property int|null $reasonId
 * @property string|null $reasonDescription
 */
class StatusReason
{

    /**
     * @var int|null
     */
    private $reasonId;

    /**
     * @var string|null
     */
    private $reasonDescription;

    /**
     * @return int|null
     */
    public function getReasonId(): ?int
    {
        return $this->reasonId;
    }

    /**
     * @param int|null $reasonId
     * @return StatusReason
     */
    public function setReasonId(?int $reasonId): self
    {
        $this->reasonId = $reasonId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReasonDescription(): ?string
    {
        return $this->reasonDescription;
    }

    /**
     * @param string|null $reasonDescription
     *
     * @return StatusReason
     */
    public function setReasonDescription(?string $reasonDescription): self
    {
        $this->reasonDescription = $reasonDescription;

        return $this;
    }

}
