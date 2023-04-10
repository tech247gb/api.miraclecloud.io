<?php

declare(strict_types=1);

namespace App\Application\AzureAccountApp\Query\Command\BulkLoad;

use App\Application\HandlerBase;
use App\Infrastructure\DatabaseRepository\AzureAccountAppRepository;

class AzureAccountAppBulkLoadHandler extends HandlerBase
{
    /** @var AzureAccountAppRepository */
    private $accountAppRepository;

    public function __construct(
        AzureAccountAppRepository $accountAppRepository
    ) {
        $this->accountAppRepository = $accountAppRepository;
    }

    /**
     * @param AzureAccountAppBulkLoad $command
     */
    public function work($command)
    {
        return $this->accountAppRepository->bulkLoad(
            $command->getClientId(),
            $command->getAccountsIds()
        );
    }
}
