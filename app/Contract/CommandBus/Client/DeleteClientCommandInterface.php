<?php

namespace App\Contract\CommandBus\Client;

use App\Contract\CommandBus\CommandInterface;

/**
 * Interface DeleteClientCommandInterface
 * @package App\Contract\CommandBus\Client
 */
interface DeleteClientCommandInterface extends CommandInterface
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
     * @return int
     */
    public function getUserId(): int;

    /**
     * @param int $userId
     * @return self
     */
    public function setUserId(int $userId): self;

    /**
     * @return DeleteClientCommandInterface
     */
    public static function getCommand(): CommandInterface;
}
