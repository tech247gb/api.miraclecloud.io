<?php


namespace App\Contract\CommandBus;

/**
 * Interface GetUserByIdCommandInterface
 * @package App\Contract\Core
 */
interface GetUserByIdCommandInterface extends CommandInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return GetUserByIdCommandInterface
     */
    public function setId(int $id): GetUserByIdCommandInterface;

    /**
     * @return GetUserByIdCommandInterface
     */
    public static function getCommand(): CommandInterface;
}
