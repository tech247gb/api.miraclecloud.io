<?php


namespace App\Domain\Owner;


class OwnerFilter
{

    /**
     * @var int|null
     */
    private $clientId;

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $clientId
     * @return OwnerFilter
     */
    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

}
