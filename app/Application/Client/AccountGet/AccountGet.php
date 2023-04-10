<?php

namespace App\Application\Client\AccountGet;

use App\Contract\CommandBus\Client\AccountCommandInterface;
use App\Contract\CommandBus\CommandInterface;

/**
 * Class AccountGet
 * @package App\Application\Client\AccountGet
 */
class AccountGet implements AccountCommandInterface
{
    /**
     * @var int|null
     */
    private $clientId;
    /**
     * @var int|null
     */
    private $accountId;

    /**
     * @param int|null $accountId
     * @return AccountCommandInterface
     */
    public function setAccountId(?int $accountId): AccountCommandInterface
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAccountId():? int
    {
        return $this->accountId;
    }

    /**
     * @return self
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }
    /**
     * @param int|null $clientId
     * @return AccountCommandInterface
     */
    public function setClientId(?int $clientId): AccountCommandInterface
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }
}
