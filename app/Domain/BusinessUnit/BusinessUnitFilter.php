<?php

namespace App\Domain\BusinessUnit;

/**
 * Class BusinessUnitFilter
 * @package App\Domain\BusinessUnit
 */
class BusinessUnitFilter
{

    /**
     * @var int|null
     */
    private $businessUnitId;

    /**
     * @var int|null
     */
    private $clientId;

    /**
     * @var string|null
     */
    private $businessUnitName;

    /**
     * @return int|null
     */
    public function getBusinessUnitId(): ?int
    {
        return $this->businessUnitId;
    }

    /**
     * @param int|null $businessUnitId
     * @return BusinessUnitFilter
     */
    public function setBusinessUnitId(int $businessUnitId): self
    {
        $this->businessUnitId = $businessUnitId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $clientId
     * @return BusinessUnitFilter
     */
    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBusinessUnitName(): ?string
    {
        return $this->businessUnitName;
    }

    /**
     * @param string|null $businessUnitName
     * @return BusinessUnitFilter
     */
    public function setBusinessUnitName(?string $businessUnitName): self
    {
        $this->businessUnitName = $businessUnitName;

        return $this;
    }

}
