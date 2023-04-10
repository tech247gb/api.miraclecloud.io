<?php


namespace App\Domain\Vendor;


class VendorFilter
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
     * @return VendorFilter
     */
    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

}
