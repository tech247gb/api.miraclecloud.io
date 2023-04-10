<?php


namespace App\Contract\CommandBus\Service;


use Illuminate\Support\Collection;

interface ServiceListHandlerInterface
{

    /**
     * @param ServiceListCommandInterface $command
     * @return array
     */
    public function work(ServiceListCommandInterface $command): array;

}
