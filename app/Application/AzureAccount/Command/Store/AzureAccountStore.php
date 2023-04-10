<?php

declare(strict_types=1);

namespace App\Application\AzureAccount\Command\Store;

use App\Application\Core\CommandBase;
use App\Exceptions\UnprocessableCommandException;
use App\Contract\Exception\ValidationExceptionCodeInterface;

class AzureAccountStore extends CommandBase
{
    /** @var int */
    protected $clientId;

    /** @var string */
    protected $tenant;

    /** @var string */
    protected $clientIdKey;

    /** @var string */
    protected $clientSecret;

    /** @var string */
    protected $subscriptionId;

    /** @var string */
    protected $listAccountIDs;

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getTenant(): string
    {
        return $this->tenant;
    }

    public function setTenant(string $tenant): void
    {
        $this->tenant = $tenant;
    }

    public function getClientIdKey(): string
    {
        return $this->clientIdKey;
    }

    public function setClientIdKey(string $clientIdKey): void
    {
        $this->clientIdKey = $clientIdKey;
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    public function setClientSecret(string $clientSecret): void
    {
        $this->clientSecret = $clientSecret;
    }

    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    public function setSubscriptionId(string $subscriptionId): void
    {
        $this->subscriptionId = $subscriptionId;
    }

    public function getListAccountIDs(): string
    {
        return $this->listAccountIDs;
    }

    public function setListAccountIDs(string $listAccountIDs): void
    {
        $this->listAccountIDs = $listAccountIDs;
    }

    public function validateCommand(): bool
    {
        if (! $this->clientId) {
            throw new UnprocessableCommandException(ValidationExceptionCodeInterface::AZURE_ACCOUNT_GET_BY_CLIENT_ID_EXCEPTION, 'Entity not found');
        }

        return true;
    }
}
