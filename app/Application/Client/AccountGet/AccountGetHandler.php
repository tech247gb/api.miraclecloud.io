<?php

namespace App\Application\Client\AccountGet;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Client\AccountCommandInterface;
use App\Contract\CommandBus\Client\AccountHandlerInterface;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Class AccountGetHandler
 * @package App\Application\Client\AccountGet
 */
class AccountGetHandler extends HandlerBase implements AccountHandlerInterface
{
    /** @var ClientRepositoryInterface $clientRepository */
    private $clientRepository;

    /**
     * GetClientByIdHandler constructor.
     * @param ClientRepositoryInterface $clientRepository
     */
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param AccountCommandInterface $command
     * @return array|void
     * @throws ClientSearchExceptions
     */
    public function work(AccountCommandInterface $command): array
    {

        return $this->clientRepository->getAccountById($command->getAccountId());
    }
}
