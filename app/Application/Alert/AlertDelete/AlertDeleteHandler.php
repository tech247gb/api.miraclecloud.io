<?php


namespace App\Application\Alert\AlertDelete;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\AlertRepositoryInterface;
use App\Domain\Alert\AlertFilter;
use App\Exceptions\Alert\AlertDeleteException;

class AlertDeleteHandler extends HandlerBase
{

    /**
     * @var AlertRepositoryInterface $alertRepository
     */
    protected $alertRepository;

    /**
     * AlertDeleteHandler constructor.
     * @param AlertRepositoryInterface $alertRepository
     */
    public function __construct(AlertRepositoryInterface $alertRepository)
    {
        $this->alertRepository = $alertRepository;
    }

    /**
     * @param AlertDelete|CommandInterface $command
     * @throws AlertDeleteException
     */
    protected function work(CommandInterface $command)
    {

        if (!$this->alertRepository->delete($this->getFilter($command))) {

            throw new AlertDeleteException();
        }
    }

    /**
     * @param AlertDelete $command
     * @return AlertFilter
     */
    private function getFilter(AlertDelete $command)
    {
        return $this->alertRepository->getAlertFilter()->setAlertId($command->getId());
    }

}
