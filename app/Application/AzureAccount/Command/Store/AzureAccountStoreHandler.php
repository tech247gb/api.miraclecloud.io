<?php

declare(strict_types=1);

namespace App\Application\AzureAccount\Command\Store;

use App\Application\HandlerBase;
use App\Infrastructure\DatabaseRepository\AzureAccountRepository;

class AzureAccountStoreHandler extends HandlerBase
{
    /** @var AzureAccountRepository */
    private $azureAccountRepository;

    public function __construct(
        AzureAccountRepository $azureAccountRepository
    ) {
        $this->azureAccountRepository = $azureAccountRepository;
    }

    /**
     * @param AzureAccountStore $command
     */
    public function work($command)
    {
        return $this->azureAccountRepository->store(
            $command->getClientId(),
            $command->getTenant(),
            $command->getClientIdKey(),
            $command->getClientSecret(),
            $command->getSubscriptionId(),
            $command->getListAccountIDs()
        );
    }
}
