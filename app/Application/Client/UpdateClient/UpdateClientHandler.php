<?php

namespace App\Application\Client\UpdateClient;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Client\LoadClientCommandInterface;
use App\Contract\CommandBus\Client\UpdateClientCommandInterface;
use App\Contract\CommandBus\Client\UpdateClientHandlerInterface;
use App\Domain\Client\Client;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientSaveExceptions;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Class UpdateClientHandler
 * @package App\Application\Client
 *
 * @property ClientRepositoryInterface $clientRepository
 */
class UpdateClientHandler extends HandlerBase implements UpdateClientHandlerInterface
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
     * @param UpdateClientCommandInterface $command
     * @return Client
     * @throws ClientSearchExceptions
     * @throws ClientSaveExceptions
     */
    public function work(UpdateClientCommandInterface $command): Client
    {
        if (!$client = $this->clientRepository->byId($command->getId())) {

            throw new ClientSearchExceptions($command->getId());
        }

        return $this->clientRepository->store(
            $this->setPropertiesData($command, $client)
        );
    }

    /**
     * @param LoadClientCommandInterface $command
     * @param Client $client
     * @return Client
     */
    private function setPropertiesData(LoadClientCommandInterface $command, Client $client): Client
    {
        $client->name = $command->getName();

        return $client;
    }
}
