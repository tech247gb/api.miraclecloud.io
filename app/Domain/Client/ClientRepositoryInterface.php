<?php

namespace App\Domain\Client;
use App\Contract\Core\SortingInterface;
use App\Exceptions\Client\ClientDeleteExceptions;
use App\Exceptions\Client\ClientSaveExceptions;
use Illuminate\Support\Collection;

/**
 * Interface ClientRepositoryInterface
 * @package App\Domain
 */
interface ClientRepositoryInterface
{
    /**
     * @param ClientFilter $filter
     * @param SortingInterface|null $sorting
     * @return array
     */
    public function all(ClientFilter $filter, SortingInterface $sorting = null): array;

    /**
     * @param int $id
     * @return Client|null
     */
    public function byId(int $id): ?Client;

    /**
     * @param Client $model
     *
     * @return Client
     * @throws ClientSaveExceptions
     */
    public function store(Client $model): Client;

    /**
     * @param Client $model
     * @throws ClientDeleteExceptions
     */
    public function delete(Client $model): void;

    /**
     * @param Client $model
     * @return array
     */
    public function getAccountList(Client $model): array;

    /**
     * @param ClientFilter $filter
     * @return Collection
     */
    public function getResourceList(ClientFilter $filter): Collection;

    /**
     * @return ClientFilter
     */
    public function getClientRepositoryFilter(): ClientFilter;
}
