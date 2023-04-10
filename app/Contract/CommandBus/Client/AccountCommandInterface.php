<?php

namespace App\Contract\CommandBus\Client;

use App\Contract\CommandBus\CommandInterface;

/**
 * Interface AccountCommandInterface
 * @package App\Contract\CommandBus\Client
 */
interface AccountCommandInterface extends CommandInterface
{

    /**
     * @return int
     */
    public function getClientId(): ?int;

    /**
     * @param int|null $clientId
     * @return $this
     */
    public function setClientId(?int $clientId): self;

    /**
     * @return int
     */
    public function getAccountId(): ?int;

    /**
     * @param int|null $accountId
     * @return $this
     */
    public function setAccountId(?int $accountId): self;

    /**
     * @return CommandInterface
     */
    public static function getCommand(): CommandInterface;
}
