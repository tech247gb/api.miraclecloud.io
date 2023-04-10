<?php


namespace App\Contract\CommandBus\Client;

use App\Domain\Client\Client;
use App\Exceptions\Client\ClientSaveExceptions;

/**
 * Interface CreateClientHandlerInterface
 * @package App\Contract\CommandBus\Client
 */
interface CreateClientHandlerInterface
{
    /**
     * @param CreateClientCommandInterface $command
     * @return Client
     * @throws ClientSaveExceptions
     */
    public function work(CreateClientCommandInterface $command): Client;
}
