<?php

namespace App\Application\Client\AccountList;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Client\AccountCommandInterface;
use App\Contract\CommandBus\Client\AccountHandlerInterface;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Class AccountListHandler
 * @package App\Application\Client\AccountList
 */
class AccountListHandler extends HandlerBase implements AccountHandlerInterface
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
        if (!$client = $this->clientRepository->byId($command->getClientId())) {

            throw new ClientSearchExceptions($command->getClientId());
        }


        return $this->clientRepository->getAccountList($client);
    }
}
