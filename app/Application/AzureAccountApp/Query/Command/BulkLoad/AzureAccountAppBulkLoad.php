<?php

declare(strict_types=1);

namespace App\Application\AzureAccountApp\Query\Command\BulkLoad;

use App\Application\Core\CommandBase;
use App\Exceptions\UnprocessableCommandException;
use App\Contract\Exception\ValidationExceptionCodeInterface;

class AzureAccountAppBulkLoad extends CommandBase
{
    /** @var int */
    protected $clientId;

    /** @var string */
    protected $accountsIds;

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getAccountsIds(): string
    {
        return $this->accountsIds;
    }

    public function setAccountsIds(string $accountsIds): void
    {
        $this->accountsIds = $accountsIds;
    }

    public function validateCommand(): bool
    {
        if (! $this->clientId || ! $this->accountsIds) {
            throw new UnprocessableCommandException(ValidationExceptionCodeInterface::AZURE_ACCOUNT_APP_LIST_BY_CLIENT_ID_EXCEPTION, 'Entity not found');
        }

        return true;
    }
}
