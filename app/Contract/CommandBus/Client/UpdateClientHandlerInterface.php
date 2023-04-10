<?php

namespace App\Contract\CommandBus\Client;

use App\Domain\Client\Client;
use App\Exceptions\Client\ClientSaveExceptions;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Interface UpdateClientHandlerInterface
 * @package App\Contract\CommandBus\Client
 */
interface UpdateClientHandlerInterface
{
    /**
     * @param UpdateClientCommandInterface $command
     * @return Client
     * @throws ClientSaveExceptions
     * @throws ClientSearchExceptions
     */
    public function work(UpdateClientCommandInterface $command): Client;
}
