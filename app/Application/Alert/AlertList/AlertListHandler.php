<?php


namespace App\Application\Alert\AlertList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\AlertRepositoryInterface;
use App\Domain\Alert\AlertFilter;
use Illuminate\Support\Collection;

class AlertListHandler extends HandlerBase
{

    /**
     * @var AlertRepositoryInterface
     */
    protected $alertRepository;

    /**
     * AlertListHandler constructor.
     * @param AlertRepositoryInterface $alertRepository
     */
    public function __construct(AlertRepositoryInterface $alertRepository)
    {
        $this->alertRepository = $alertRepository;
    }

    /**
     * @param AlertList|CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command): Collection
    {
        return $this->alertRepository->all(
            $this->getFilter($command)
        );
    }

    /**
     * @param AlertList $command
     * @return AlertFilter
     */
    private function getFilter(AlertList $command): AlertFilter
    {
        return $this->alertRepository->getAlertFilter()->setClientId($command->getClientId());
    }

}
