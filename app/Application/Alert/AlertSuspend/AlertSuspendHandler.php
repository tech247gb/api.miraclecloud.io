<?php


namespace App\Application\Alert\AlertSuspend;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\AlertRepositoryInterface;
use App\Domain\Alert\AlertFilter;
use App\Exceptions\Alert\AlertSuspendException;

class AlertSuspendHandler extends HandlerBase
{
    /**
     * @var AlertRepositoryInterface $alertRepository
     */
    protected $alertRepository;

    /**
     * AlertSuspendHandler constructor.
     * @param AlertRepositoryInterface $alertRepository
     */
    public function __construct(AlertRepositoryInterface $alertRepository)
    {
        $this->alertRepository = $alertRepository;
    }

    /**
     * @param AlertSuspend|CommandInterface $command
     * @throws AlertSuspendException
     */
    protected function work(CommandInterface $command)
    {
        if (!$this->alertRepository->suspend($this->getFilter($command))) {

            throw new AlertSuspendException($command->getAlertId());
        }
    }

    /**
     * @param AlertSuspend $command
     * @return AlertFilter
     */
    private function getFilter(AlertSuspend $command)
    {
        return $this->alertRepository->getAlertFilter()->setAlertId($command->getAlertId());
    }

}
