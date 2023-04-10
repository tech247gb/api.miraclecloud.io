<?php

namespace App\Domain\BusinessUnit;

/**
 * Class BusinessUnitFilter
 * @package App\Domain\BusinessUnit
 */
class BusinessUnit
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $clientId;

    /**
     * @var string
     */
    private $businessUnitName;

    /**
     * BusinessUnit constructor.
     * @param int $id
     * @param int $clientId
     * @param string $businessUnitName
     */
    public function __construct(int $id, int $clientId, string $businessUnitName)
    {
        $this->id = $id;
        $this->clientId = $clientId;
        $this->businessUnitName = $businessUnitName;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     */
    public function setClientId(int $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getBusinessUnitName(): string
    {
        return $this->businessUnitName;
    }

    /**
     * @param string $businessUnitName
     */
    public function setBusinessUnitName(string $businessUnitName): void
    {
        $this->businessUnitName = $businessUnitName;
    }


}
