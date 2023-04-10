<?php


namespace App\Contract\CommandBus\Vendor;


use App\Contract\CommandBus\CommandInterface;

interface VendorListCommandInterface extends CommandInterface
{

    /**
     * @return int
     */
    public function getClientId(): int;

    /**
     * @param int $clientId
     * @return $this
     */
    public function setClientId(int $clientId): self;

}
