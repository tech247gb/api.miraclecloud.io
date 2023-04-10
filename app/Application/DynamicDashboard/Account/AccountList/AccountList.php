<?php


namespace App\Application\DynamicDashboard\Account\AccountList;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\DynamicDashboard\AccountList\AccountListCommandInterface;

class AccountList implements AccountListCommandInterface
{

    /**
     * @var int
     */
    private $clientId;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return AccountListCommandInterface
     */
    public function setClientId(int $clientId): AccountListCommandInterface
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return AccountListCommandInterface
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }

}
