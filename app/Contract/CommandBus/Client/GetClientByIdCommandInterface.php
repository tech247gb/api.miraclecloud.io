<?php

namespace App\Contract\CommandBus\Client;

use App\Contract\CommandBus\CommandInterface;

/**
 * Interface GetClientByIdCommandInterface
 * @package App\Contract\CommandBus\Client
 */
interface GetClientByIdCommandInterface extends CommandInterface
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

    /**
     * @return GetClientByIdCommandInterface
     */
    public static function getCommand(): CommandInterface;
}
