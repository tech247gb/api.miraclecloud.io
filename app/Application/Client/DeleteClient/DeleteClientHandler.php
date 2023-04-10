<?php

namespace App\Application\Client\DeleteClient;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Client\DeleteClientCommandInterface;
use App\Contract\CommandBus\Client\DeleteClientHandlerInterface;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientDeleteExceptions;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Class DeleteClientHandler
 * @package App\Application\Client\DeleteClient
 *
 * @property ClientRepositoryInterface $clientRepository
 */
class DeleteClientHandler extends HandlerBase implements DeleteClientHandlerInterface
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
     * @param DeleteClientCommandInterface $command
     * @throws ClientSearchExceptions
     * @throws ClientDeleteExceptions
     */
    public function work(DeleteClientCommandInterface $command): void
    {
        if (!$client = $this->clientRepository->byId($command->getId())) {

            throw new ClientSearchExceptions($command->getId());
        }

        $this->clientRepository->delete($client);
    }
}
