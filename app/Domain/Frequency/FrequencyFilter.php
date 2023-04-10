<?php


namespace App\Domain\Frequency;


class FrequencyFilter
{

    /**
     * @var int|null
     */
    private $alertTypeId;

    /**
     * @return int|null
     */
    public function getAlertTypeId(): ?int
    {
        return $this->alertTypeId;
    }

    /**
     * @param int|null $alertTypeId
     * @return FrequencyFilter
     */
    public function setAlertTypeId(?int $alertTypeId): self
    {
        $this->alertTypeId = $alertTypeId;

        return $this;
    }

}
