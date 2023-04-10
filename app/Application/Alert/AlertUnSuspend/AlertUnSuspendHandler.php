<?php


namespace App\Application\Alert\AlertUnSuspend;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\AlertRepositoryInterface;
use App\Domain\Alert\AlertFilter;
use App\Exceptions\Alert\AlertUnSuspendException;

class AlertUnSuspendHandler extends HandlerBase
{

    /**
     * @var AlertRepositoryInterface $alertRepository
     */
    protected $alertRepository;

    /**
     * AlertUnSuspendHandler constructor.
     * @param AlertRepositoryInterface $alertRepository
     */
    public function __construct(AlertRepositoryInterface $alertRepository)
    {
        $this->alertRepository = $alertRepository;
    }

    /**
     * @param AlertUnSuspend|CommandInterface $command
     * @throws AlertUnSuspendException
     */
    protected function work(CommandInterface $command)
    {
        if (!$this->alertRepository->unSuspend($this->getFilter($command))) {

            throw new AlertUnSuspendException($command->getAlertId());
        }
    }

    /**
     * @param AlertUnSuspend $command
     * @return AlertFilter
     */
    private function getFilter(AlertUnSuspend $command)
    {
        return $this->alertRepository->getAlertFilter()->setAlertId($command->getAlertId());
    }

}
