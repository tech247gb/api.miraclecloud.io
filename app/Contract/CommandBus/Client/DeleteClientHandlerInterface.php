<?php


namespace App\Contract\CommandBus\Client;

use App\Exceptions\Client\ClientDeleteExceptions;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Interface DeleteClientHandlerInterface
 * @package App\Contract\CommandBus\Client
 */
interface DeleteClientHandlerInterface
{
    /**
     * @param DeleteClientCommandInterface $command
     * @return void
     * @throws ClientSearchExceptions
     * @throws ClientDeleteExceptions
     */
    public function work(DeleteClientCommandInterface $command): void;
}
