<?php


namespace App\Contract\CommandBus\Client;

use App\Domain\Client\Client;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Interface GetUserByIdHandlerInterface
 * @package App\Contract\CommandBus\Client
 */
interface GetClientByIdHandlerInterface
{
    /**
     * @param GetClientByIdCommandInterface $command
     * @return Client
     * @throws ClientSearchExceptions
     */
    public function work(GetClientByIdCommandInterface $command): Client;
}
