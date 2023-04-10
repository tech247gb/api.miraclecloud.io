<?php


namespace App\Contract\CommandBus;

use App\Domain\User\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CommandInterface
 * @package App\Contract\Core
 */
interface GetUserByFilterHandlerInterface
{
    /**
     * @param GetUserByFilterCommandInterface $command
     * @return Collection|User|null
     */
    public function work(GetUserByFilterCommandInterface $command);
}
