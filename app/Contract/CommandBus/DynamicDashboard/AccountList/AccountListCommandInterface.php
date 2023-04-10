<?php


namespace App\Contract\CommandBus\DynamicDashboard\AccountList;


use App\Contract\CommandBus\CommandInterface;

interface AccountListCommandInterface extends CommandInterface
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
