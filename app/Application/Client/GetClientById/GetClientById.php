<?php

namespace App\Application\Client\GetClientById;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\Client\GetClientByIdCommandInterface;

/**
 * Class GetClientById
 * @package App\Application\User
 */
class GetClientById implements GetClientByIdCommandInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return GetClientByIdCommandInterface
     */
    public function setId(int $id): GetClientByIdCommandInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return GetClientById
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }
}
