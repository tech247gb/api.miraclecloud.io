<?php

namespace App\Application\Client\CreateClient;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Client\CreateClientCommandInterface;
use App\Contract\CommandBus\Client\CreateClientHandlerInterface;
use App\Domain\Client\Client;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientSaveExceptions;

/**
 * Class CreateUserHandler
 * @package App\Application\Client
 *
 * @property ClientRepositoryInterface $clientRepository
 */
class CreateClientHandler extends HandlerBase implements CreateClientHandlerInterface
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
     * @param CreateClientCommandInterface $command
     * @return Client
     * @throws ClientSaveExceptions
     */
    public function work(CreateClientCommandInterface $command): Client
    {
        return $this->clientRepository->store(
            $this->createClientWithPropertiesData($command)
        );
    }

    /**
     * @param CreateClientCommandInterface $command
     * @return Client
     */
    private function createClientWithPropertiesData(CreateClientCommandInterface &$command): Client
    {
        $client = new Client();
        $client->name = $command->getName();

        return $client;
    }
}
