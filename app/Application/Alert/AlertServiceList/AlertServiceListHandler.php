<?php


namespace App\Application\Alert\AlertServiceList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\AlertRepositoryInterface;
use App\Domain\Alert\AlertFilter;
use Illuminate\Support\Collection;

class AlertServiceListHandler extends HandlerBase
{

    /**
     * @var AlertRepositoryInterface $alertRepository
     */
    protected $alertRepository;

    /**
     * AlertServiceListHandler constructor.
     * @param AlertRepositoryInterface $alertRepository
     */
    public function __construct(AlertRepositoryInterface $alertRepository)
    {
        $this->alertRepository = $alertRepository;
    }

    /**
     * @param AlertServiceList|CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command): Collection
    {
        return $this->alertRepository->getAlertServiceList($this->getFilter($command));
    }

    /**
     * @param AlertServiceList $command
     * @return AlertFilter
     */
    private function getFilter(AlertServiceList $command): AlertFilter
    {
        return $this->alertRepository->getAlertFilter()->setProductId($command->getProductId());
    }

}
