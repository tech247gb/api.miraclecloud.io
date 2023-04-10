<?php

declare(strict_types=1);

namespace App\Application\AzureAccount\Query\ByClientId;

use App\Application\HandlerBase;
use App\Infrastructure\DatabaseRepository\AzureAccountRepository;

class AzureAccountByClientIdHandler extends HandlerBase
{
    /** @var AzureAccountRepository */
    private $azureAccountRepository;

    public function __construct(
        AzureAccountRepository $azureAccountRepository
    ) {
        $this->azureAccountRepository = $azureAccountRepository;
    }

    /**
     * @param AzureAccountByClientId $command
     */
    public function work($command)
    {
        return $this->azureAccountRepository->byClientId($command->getClientId());
    }
}
