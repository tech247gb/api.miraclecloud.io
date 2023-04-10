<?php


namespace App\Contract\CommandBus\Client;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface ListClientHandlerInterface
 * @package App\Contract\CommandBus\Client
 */
interface ListClientHandlerInterface
{
    /**
     * @param ListClientCommandInterface $command
     * @return array
     */
    public function work(ListClientCommandInterface $command): array;
}
