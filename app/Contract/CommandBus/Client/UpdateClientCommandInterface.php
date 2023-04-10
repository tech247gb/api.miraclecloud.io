<?php

namespace App\Contract\CommandBus\Client;

/**
 * Interface UpdateClientCommandInterface
 * @package App\Contract\CommandBus\Client
 */
interface UpdateClientCommandInterface extends LoadClientCommandInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self;
}
