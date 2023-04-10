<?php

declare(strict_types=1);

namespace App\Application\AzureAccountApp\Query\ListByClientId;

use App\Application\HandlerBase;
use App\Infrastructure\DatabaseRepository\AzureAccountAppRepository;

class AzureAccountAppListByClientIdHandler extends HandlerBase
{
    /** @var AzureAccountAppRepository */
    private $accountAppRepository;

    public function __construct(
        AzureAccountAppRepository $accountAppRepository
    ) {
        $this->accountAppRepository = $accountAppRepository;
    }

    /**
     * @param AzureAccountAppListByClientId $command
     */
    public function work($command)
    {
        return $this->accountAppRepository->listByClientId($command->getClientId());
    }
}
