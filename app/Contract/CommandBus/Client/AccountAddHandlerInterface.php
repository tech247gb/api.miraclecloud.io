<?php


namespace App\Contract\CommandBus\Client;


/**
 * Interface AccountAddHandlerInterface
 * @package App\Contract\CommandBus\Client
 */
interface AccountAddHandlerInterface
{
    /**
     * @param AccountAddCommandInterface $command
     * @return array
     */
    public function work(AccountAddCommandInterface $command): array;
}
