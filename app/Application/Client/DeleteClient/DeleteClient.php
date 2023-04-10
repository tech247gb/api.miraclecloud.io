<?php

namespace App\Application\Client\DeleteClient;

use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\Client\DeleteClientCommandInterface;

/**
 * Class DeleteClient
 * @package App\Application\User
 */
class DeleteClient implements DeleteClientCommandInterface
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var int|null
     */
    private $userId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return DeleteClientCommandInterface
     */
    public function setId(int $id): DeleteClientCommandInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return DeleteClientCommandInterface
     */
    public function setUserId(int $userId): DeleteClientCommandInterface
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return self
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }
}
