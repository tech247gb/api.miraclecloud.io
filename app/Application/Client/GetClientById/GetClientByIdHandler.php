<?php

namespace App\Application\Client\GetClientById;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Client\GetClientByIdCommandInterface;
use App\Contract\CommandBus\Client\GetClientByIdHandlerInterface;
use App\Domain\Client\Client;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Class GetClientByIdHandler
 * @package App\Application\Client\GetClientById
 *
 * @property ClientRepositoryInterface $clientRepository
 */
class GetClientByIdHandler extends HandlerBase implements GetClientByIdHandlerInterface
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
     * @param GetClientByIdCommandInterface $command
     * @return Client
     * @throws ClientSearchExceptions
     */
    public function work(GetClientByIdCommandInterface $command): Client
    {

        if (!$Client = $this->clientRepository->byId($command->getId())) {

            throw new ClientSearchExceptions($command->getId());
        }

        return $Client;
    }
}
