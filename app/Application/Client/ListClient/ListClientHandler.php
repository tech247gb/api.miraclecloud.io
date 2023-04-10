<?php

namespace App\Application\Client\ListClient;

use App\Application\HandlerBase;
use App\Contract\CommandBus\Client\ListClientCommandInterface;
use App\Contract\CommandBus\Client\ListClientHandlerInterface;
use App\Contract\Core\PaginationInterface;
use App\Domain\Client\ClientFilter;
use App\Domain\Client\ClientRepositoryInterface;
use App\Infrastructure\Core\Pagination;

/**
 * Class ListClientHandler
 * @package App\Application\Client
 *
 * @property ClientRepositoryInterface $clientRepository
 */
class ListClientHandler extends HandlerBase implements ListClientHandlerInterface
{
    /** @var ClientRepositoryInterface $clientRepository */
    private $clientRepository;

    /**
     * ListClientHandler constructor.
     * @param ClientRepositoryInterface $clientRepository
     */
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param ListClientCommandInterface $command
     * @return array
     */
    public function work(ListClientCommandInterface $command): array
    {
        return $this->clientRepository->all(
            $this->createFilterWithPropertiesData($command)
        );
    }

    /**
     * @param ListClientCommandInterface $command
     * @return ClientFilter
     */
    private function createFilterWithPropertiesData(ListClientCommandInterface $command): ClientFilter
    {
        return $this->clientRepository
            ->getClientRepositoryFilter();
    }

    /**
     * @param ListClientCommandInterface $command
     * @return PaginationInterface
     */
    private function createPagination(ListClientCommandInterface &$command): PaginationInterface
    {
        return (
                new Pagination(
                    $command->getPage(),
                    $command->getPerPage()
                )
            )->setPath($command->getPath());
    }
}
