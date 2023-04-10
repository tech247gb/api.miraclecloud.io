<?php


namespace App\Contract\CommandBus\Service;


use App\Contract\CommandBus\CommandInterface;

interface ServiceListCommandInterface extends CommandInterface
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
