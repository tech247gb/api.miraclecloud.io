<?php


namespace App\Application\Source\SourceList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\SourceRepositoryInterface;
use App\Domain\Source\SourceFilter;
use Illuminate\Support\Collection;

class SourceListHandler extends HandlerBase
{

    /**
     * @var SourceRepositoryInterface $sourceRepository
     */
    private $sourceRepository;

    /**
     * SourceListHandler constructor.
     * @param SourceRepositoryInterface $sourceRepository
     */
    public function __construct(SourceRepositoryInterface $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    /**
     * @param SourceList|CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command)
    {
        return $this->sourceRepository->all($this->getFilter($command));
    }

    /**
     * @param SourceList $command
     * @return SourceFilter
     */
    private function getFilter(SourceList $command): SourceFilter
    {
        return $this->sourceRepository->getSourceFilter()->setAlertTypeId($command->getAlertTypeId());
    }
}
