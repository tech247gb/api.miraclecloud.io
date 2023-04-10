<?php


namespace App\Application\Owner\OwnerList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\OwnerRepositoryInterface;
use App\Domain\Owner\OwnerFilter;
use Illuminate\Support\Collection;

class OwnerListHandler extends HandlerBase
{
    /**
     * @var OwnerRepositoryInterface $ownerRepository
     */
    protected $ownerRepository;

    /**
     * OwnerListHandler constructor.
     * @param OwnerRepositoryInterface $ownerRepository
     */
    public function __construct(OwnerRepositoryInterface $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    /**
     * @param OwnerList|CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command): Collection
    {
        return $this->ownerRepository->all(
            $this->getFilter($command)
        );
    }

    /**
     * @param OwnerList $command
     * @return OwnerFilter
     */
    private function getFilter(OwnerList $command): OwnerFilter
    {
        return $this->ownerRepository->getOwnerFilter()->setClientId($command->getClientId());
    }

}
