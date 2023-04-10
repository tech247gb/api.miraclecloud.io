<?php


namespace App\Contract\CommandBus;

use App\Domain\User\User;

/**
 * Interface GetUserByIdHandlerInterface
 * @package App\Contract\Core
 */
interface GetUserByIdHandlerInterface
{
    public function work(GetUserByIdCommandInterface $command): ?User;
}
