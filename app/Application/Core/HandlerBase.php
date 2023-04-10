<?php

namespace App\Application\Core;

use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\HandlerInterface;

/**
 * Class HandlerBase
 * @package App\Application
 *
 */
abstract class HandlerBase implements HandlerInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed|void
     */
    public function handle(CommandInterface $command)
    {
        $command->validateCommand();

        return $this->work($command);
    }

    abstract protected function work(CommandInterface $command);
}
