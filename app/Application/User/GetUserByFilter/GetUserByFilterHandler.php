<?php

namespace App\Application\User\GetUserByFilter;

use App\Application\HandlerBase;
use App\Contract\CommandBus\GetUserByFilterCommandInterface;
use App\Contract\CommandBus\GetUserByFilterHandlerInterface;
use App\Domain\User\User;
use App\Domain\User\UserRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class GetUserByFilterHandler
 * @package App\Application\User\GetUserByFilter
 *
 * @property UserRepositoryInterface $userRepository
 */
class GetUserByFilterHandler extends HandlerBase implements GetUserByFilterHandlerInterface
{
    /** @var UserRepositoryInterface $userRepository */
    private $userRepository;

    /**
     * GetUserByIdHandler constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param GetUserByFilterCommandInterface $command
     * @return User|null|Collection
     */
    public function work(GetUserByFilterCommandInterface $command)
    {
        if ($command->getOne()) {

            return $this->userRepository->one($this->getFilterByCommand($command));
        }
        if ($command->isSSO()) {

            return $this->userRepository->ssoLogin($this->getFilterSsoByCommand($command));
        }

        return $this->userRepository->all($this->getFilterByCommand($command), null);
    }

    /**
     * @param GetUserByFilterCommandInterface $command
     * @return \App\Domain\User\UserFilter
     */
    protected function getFilterByCommand(GetUserByFilterCommandInterface $command)
    {
        return $this->userRepository
            ->getUserRepositoryFilter()
            ->setEmail($command->getEmail())
            ->setPassword($command->getPassword())
            ->setIp($command->getIp());
    }
    /**
     * @param GetUserByFilterCommandInterface $command
     * @return \App\Domain\User\UserFilter
     */
    protected function getFilterSsoByCommand(GetUserByFilterCommandInterface $command)
    {
        return $this->userRepository
            ->getUserRepositoryFilter()
            ->setEmail($command->getEmail())
            ->setName($command->getName());
    }
}
