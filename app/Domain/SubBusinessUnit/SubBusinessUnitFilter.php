<?php


namespace App\Domain\SubBusinessUnit;

/**
 * Class SubBusinessUnitFilter
 * @package App\Domain\SubBusinessUnit
 *
 * @property int|null $businessUnitId
 * @property string|null $subBusinessUnitName
 */
class SubBusinessUnitFilter
{
    /**
     * @var int|null
     */
    private $subBusinessUnitId;

    /**
     * @var int|null
     */
    private $businessUnitId;

    /**
     * @var string|null
     */
    private $subBusinessUnitName;

    /**
     * @return int|null
     */
    public function getSubBusinessUnitId(): ?int
    {
        return $this->subBusinessUnitId;
    }

    /**
     * @param int|null $subBusinessUnitId
     * @return SubBusinessUnitFilter
     */
    public function setSubBusinessUnitId(?int $subBusinessUnitId): self
    {
        $this->subBusinessUnitId = $subBusinessUnitId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBusinessUnitId(): ?int
    {
        return $this->businessUnitId;
    }

    /**
     * @return string|null
     */
    public function getSubBusinessUnitName(): ?string
    {
        return $this->subBusinessUnitName;
    }

    /**
     * @param int|null $businessUnitId
     * @return SubBusinessUnitFilter
     */
    public function setBusinessUnitId(?int $businessUnitId): self
    {
        $this->businessUnitId = $businessUnitId;

        return $this;
    }

    /**
     * @param string|null $subBusinessUnitName
     * @return SubBusinessUnitFilter
     */
    public function setSubBusinessUnitName(?string $subBusinessUnitName): self
    {
        $this->subBusinessUnitName = $subBusinessUnitName;

        return $this;
    }

}
