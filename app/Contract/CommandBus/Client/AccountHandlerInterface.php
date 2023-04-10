<?php


namespace App\Contract\CommandBus\Client;


/**
 * Interface AccountHandlerInterface
 * @package App\Contract\CommandBus\Client
 */
interface AccountHandlerInterface
{
    /**
     * @param AccountCommandInterface $command
     * @return array
     */
    public function work(AccountCommandInterface $command): array;
}
