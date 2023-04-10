<?php

namespace App\Application\User\GetUserById;


use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\GetUserByIdCommandInterface;

/**
 * Class GetUserById
 * @package App\Application\User
 */
class GetUserById implements GetUserByIdCommandInterface
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
     * @return GetUserByIdCommandInterface
     */
    public function setId(int $id): GetUserByIdCommandInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return GetUserById
     */
    public static function getCommand(): CommandInterface
    {
        return new self();
    }


}
