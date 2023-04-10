<?php


namespace App\Application\Resource\ResourceList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Domain\Client\ClientFilter;
use App\Domain\Client\ClientRepositoryInterface;
use Illuminate\Support\Collection;

class ResourceListHandler extends HandlerBase
{

    /**
     * @var ClientRepositoryInterface $clientRepository
     */
    private $clientRepository;

    /**
     * ResourceListHandler constructor.
     * @param ClientRepositoryInterface $clientRepository
     */
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param ResourceList|CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command): Collection
    {
        return $this->clientRepository->getResourceList($this->getFilter($command));
    }

    /**
     * @param ResourceList $command
     * @return ClientFilter
     */
    private function getFilter(ResourceList $command): ClientFilter
    {
        return $this->clientRepository->getClientRepositoryFilter()->setClientId($command->getClientId());
    }

}
