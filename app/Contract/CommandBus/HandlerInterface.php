<?php

namespace App\Contract\CommandBus;

/**
 * Interface HandlerInterface
 * @package App\Contract\Core
 */
interface HandlerInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function handle(CommandInterface $command);
}
