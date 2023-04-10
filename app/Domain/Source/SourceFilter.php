<?php


namespace App\Domain\Source;


class SourceFilter
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
     * @return SourceFilter
     */
    public function setAlertTypeId(?int $alertTypeId): self
    {
        $this->alertTypeId = $alertTypeId;

        return $this;
    }

}
