<?php


namespace App\Application;

use App\Application\User\GetUserByFilter\GetUserByFilter;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\GetUserByIdCommandInterface;
use App\Contract\CommandBus\HandlerInterface;
use App\Domain\User\User;

/**
 * Class HandlerBase
 * @package App\Application
 *
 * @method work(CommandInterface $command)
 */
abstract class HandlerBase implements HandlerInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed|void
     */
    public function handle(CommandInterface $command)
    {
        return $this->work($command);
    }
}
