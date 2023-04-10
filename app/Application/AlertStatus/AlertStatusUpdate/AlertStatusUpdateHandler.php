<?php

declare(strict_types = 1);

namespace App\Application\AlertStatus\AlertStatusUpdate;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Domain\AlertStatus\AlertStatusFilter;
use App\Exceptions\AlertStatus\AlertStatusUpdateException;
use App\Infrastructure\DatabaseRepository\AlertStatusRepository;

/**
 * Class AlertStatusUpdateHandler
 * @package App\Application\AlertStatus\AlertStatusUpdate
 *
 * @property AlertStatusRepository $alertStatusRepository
 */
class AlertStatusUpdateHandler extends HandlerBase
{

    /**
     * @var AlertStatusRepository $alertStatusRepository
     */
    private $alertStatusRepository;

    /**
     * AlertStatusUpdateHandler constructor.
     * @param AlertStatusRepository $alertStatusRepository
     */
    public function __construct(AlertStatusRepository $alertStatusRepository)
    {
        $this->alertStatusRepository = $alertStatusRepository;
    }

    /**
     * @param AlertStatusUpdate|CommandInterface $command
     *
     * @throws AlertStatusUpdateException
     */
    protected function work(CommandInterface $command)
    {
        $alertStatusFilter = $this->getFilter($command);

        if (!$this->alertStatusRepository->update($alertStatusFilter)) {

            throw new AlertStatusUpdateException($command->getAlertId());
        }
    }

    /**
     * @param AlertStatusUpdate $command
     *
     * @return AlertStatusFilter
     */
    private function getFilter(AlertStatusUpdate &$command): AlertStatusFilter
    {
        $alertStatusFilter = $this->alertStatusRepository->getFilter();
        $alertStatusFilter->setAlertId($command->getAlertId());
        $alertStatusFilter->setReasonId($command->getReasonId());
        $alertStatusFilter->setStatusId($command->getStatusId());
        $alertStatusFilter->setUserId($command->getUserId());

        return $alertStatusFilter;
    }
}
