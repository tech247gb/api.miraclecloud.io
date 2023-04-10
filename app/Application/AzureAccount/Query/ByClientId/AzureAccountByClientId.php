<?php

declare(strict_types=1);

namespace App\Application\AzureAccount\Query\ByClientId;

use App\Application\Core\CommandBase;
use App\Exceptions\UnprocessableCommandException;
use App\Contract\Exception\ValidationExceptionCodeInterface;

class AzureAccountByClientId extends CommandBase
{
    /** @var int */
    protected $clientId;

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function validateCommand(): bool
    {
        if (! $this->clientId) {
            throw new UnprocessableCommandException(ValidationExceptionCodeInterface::AZURE_ACCOUNT_GET_BY_CLIENT_ID_EXCEPTION, 'Entity not found');
        }

        return true;
    }
}
