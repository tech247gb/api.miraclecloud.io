<?php


namespace App\Contract\CommandBus\Client;


/**
 * Interface AccountUpdateHandlerInterface
 * @package App\Contract\CommandBus\Client
 */
interface AccountUpdateHandlerInterface
{
    /**
     * @param AccountUpdateCommandInterface $command
     * @return array
     */
    public function work(AccountUpdateCommandInterface $command): array;
}
