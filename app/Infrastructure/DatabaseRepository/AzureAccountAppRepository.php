<?php

declare(strict_types=1);

namespace App\Infrastructure\DatabaseRepository;

use App\Domain\Dashboard\DbModel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use App\Domain\AzureAccount\AzureAccountApp;

class AzureAccountAppRepository
{
    /** @var DbModel */
    private $model;

    /**
     * AccountRepository constructor.
     */
    public function __construct()
    {
        /* @var DbModel $model */
        $this->model = new DbModel();
    }

    public function listByClientId(int $clientId): Collection
    {
        $data = $this->model->azureAccountAppListByClientId([$clientId]);

        return collect($data)->map(static function ($app) {
            return (new AzureAccountApp())->load((array) $app);
        });
    }

    public function bulkLoad(int $clientId, string $accountsIds): array
    {
        try {
            return $this->model->azureAccountAppBulkLoad([$clientId, $accountsIds]);
        } catch (QueryException $e) {
            throw new \DomainException('Error occurred while bulk load');
        }
    }
}
