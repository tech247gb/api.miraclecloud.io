<?php

declare(strict_types=1);

namespace App\Infrastructure\DatabaseRepository;

use App\Domain\Dashboard\DbModel;
use App\Domain\AzureAccount\AzureAccount;
use Illuminate\Database\QueryException;

class AzureAccountRepository
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

    public function byClientId(int $clientId): ?AzureAccount
    {
        $data = $this->model->azureAccountByClientId([$clientId]);

        return $data ? (new AzureAccount())->load((array) $data[0]) : null;
    }

    public function store(
        int $clientId,
        string $tenant,
        string $clientIDKey,
        string $clientSecret,
        string $subscriptionID,
        string $listAccountIDs
    ): array {
        try {
            return $this->model->azureAccountStore([
                $clientId,
                $tenant,
                $clientIDKey,
                $clientSecret,
                $subscriptionID,
                $listAccountIDs,
            ]);
        } catch (QueryException $e) {
            throw new \DomainException('Error occurred while save data');
        }
    }
}
