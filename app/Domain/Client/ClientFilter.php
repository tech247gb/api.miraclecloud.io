<?php

namespace App\Domain\Client;

/**
 * Class ClientFilter
 * @package App\Domain\ChartDashboard
 */
class ClientFilter
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var int|null
     */
    private $clientId;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ClientFilter
     */
    public function setName(string $name): self
    {
        $this->name = $name;

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
     * @return ClientFilter
     */
    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

}
