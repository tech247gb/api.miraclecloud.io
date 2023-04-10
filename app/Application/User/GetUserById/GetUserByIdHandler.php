<?php

namespace App\Application\User\GetUserById;

use App\Application\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\CommandBus\GetUserByIdCommandInterface;
use App\Contract\CommandBus\GetUserByIdHandlerInterface;
use App\Contract\CommandBus\HandlerInterface;
use App\Domain\User\User;
use App\Domain\User\UserRepositoryInterface;

/**
 * Class GetUserByIdHandler
 * @package App\Application\User
 *
 * @property UserRepositoryInterface $userRepository
 */
class GetUserByIdHandler extends HandlerBase implements GetUserByIdHandlerInterface
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

    public function work(GetUserByIdCommandInterface $command): ?User
    {
        return $this->userRepository->byId($command->getId());
    }
}
