<?php

namespace App\Infrastructure\DatabaseRepository;

use App\Contract\Core\SortingInterface;
use App\Domain\Client\Client;
use App\Domain\Client\ClientFilter;
use App\Domain\Client\ClientRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\Resource\Resource;
use App\Exceptions\Client\AccountListExceptions;
use App\Exceptions\Client\ClientDeleteExceptions;
use App\Exceptions\Client\ClientSaveExceptions;
use Illuminate\Support\Collection;
use Mockery\Exception;

/**
 * @property DbModel $model
 *
 * Class ClientRepository
 * @package App\Infrastructure\DatabaseRepository
 */
class ClientRepository implements ClientRepositoryInterface
{
    /** @var DbModel $model */
    private $model;

    /**
     * ClientRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param ClientFilter $filter
     * @param SortingInterface|null $sorting
     * @return array
     */
    public function all(ClientFilter $filter, SortingInterface $sorting = null): array
    {
        $clients = [];

        foreach ($this->model->listClients([])->all() as $obj) {
            $clients[] = $this->createModel()->load((array)$obj);
        }

        return $clients;
    }

    /**
     * @param int $id
     * @return Client|null
     */
    public function byId(int $id): ?Client
    {
        $params = $this->model->selectClient([$id]);

        if (!$params->first()) {

            return null;
        }

        return $this->createModel()->load((array)$params->first());
    }

    /**
     * @param Client $model
     *
     * @return Client
     * @throws ClientSaveExceptions
     */
    public function store(Client $model): Client
    {
        try {

            if ($model->id) {
                $this->model->updateClient([
                    $model->id,
                    (string)$model->name,
                ]);
            } else {
                $result = $this->model->createClient([
                    (string)$model->name,
                ]);

                $model->id = $result->first()->NewClientID ?? null;

                if (is_null($model->id)) {

                    throw new ClientSaveExceptions($model);
                }
            }
        } catch (Exception $exception) {

            throw new ClientSaveExceptions($model);
        }

        return $this->byId($model->id);
    }

    /**
     * @param Client $model
     *
     * @throws ClientDeleteExceptions
     */
    public function delete(Client $model): void
    {
        try {

            $this->model->deleteClient([
                $model->id,
            ]);
        } catch (Exception $exception) {

            throw new ClientDeleteExceptions($model);
        }
    }


    /**
     * @param Client $model
     * @return array
     * @throws AccountListExceptions
     */
    public function getAccountList(Client $model):array
    {
        try {
           return $this->model->accountsList([
               $model->id,
            ])->all();
        } catch (Exception $exception) {

            throw new AccountListExceptions($model);
        }
    }

    /**
     * @param $accountId
     * @return array
     * @throws AccountListExceptions
     */
    public function getAccountById($accountId):array
    {
        try {
           return $this->model->getAccountById([
               $accountId,
            ]);
        } catch (Exception $exception) {

            throw new AccountListExceptions($accountId);
        }
    }

    /**
     * @param ClientFilter $filter
     * @return Collection
     */
    public function getResourceList(ClientFilter $filter): Collection
    {
        return $this->mapResourceList($this->model->getResourceList($this->filterResourceList($filter)));
    }

    /**
     * @param ClientFilter $filter
     * @return array
     */
    private function filterResourceList(ClientFilter $filter): array
    {
        return [
            $filter->getClientId()
        ];
    }

    /**
     * @param Collection $resources
     * @return Collection
     */
    private function mapResourceList(Collection $resources): Collection
    {
        return $resources->map(function ($resource) {

            $resourceModel = new Resource();
            $resourceModel->setId($resource->id);
            $resourceModel->setName($resource->name);

            return $resourceModel;
        });
    }

    /**
     * @return ClientFilter
     */
    public function getClientRepositoryFilter(): ClientFilter
    {
        return new ClientFilter();
    }

    private function createModel()
    {
        return new Client();
    }
}
