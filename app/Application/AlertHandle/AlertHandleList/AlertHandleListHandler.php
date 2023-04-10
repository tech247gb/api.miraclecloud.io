<?php

declare(strict_types = 1);

namespace App\Application\AlertHandle\AlertHandleList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Domain\AlertHandle\AlertHandleFilter;
use App\Infrastructure\DatabaseRepository\AlertHandleRepository;
use Illuminate\Support\Collection;

/**
 * Class AlertHandleListHandler
 * @package App\Application\AlertHandle\AlertHandleList
 *
 * @property AlertHandleRepository $alertHandleRepository
 */
class AlertHandleListHandler extends HandlerBase
{

    /**
     * @var AlertHandleRepository $alertHandleRepository
     */
    private $alertHandleRepository;

    /**
     * AlertHandleListHandler constructor.
     * @param AlertHandleRepository $alertHandleRepository
     */
    public function __construct(AlertHandleRepository $alertHandleRepository)
    {
        $this->alertHandleRepository = $alertHandleRepository;
    }

    /**
     * @param AlertHandleList|CommandInterface $command
     *
     * @return Collection
     */
    protected function work(CommandInterface $command)
    {
        return $this->alertHandleRepository->all($this->getFilter($command));
    }

    /**
     * @param AlertHandleList $command
     *
     * @return AlertHandleFilter
     */
    private function getFilter(AlertHandleList &$command): AlertHandleFilter
    {
        $alertHandleFilter = $this->alertHandleRepository->getFilter();
        $alertHandleFilter->setClientId($command->getClientId());
        $alertHandleFilter->setStatusId($command->getStatusId());
        $alertHandleFilter->setPage($command->getPagination()->getPage());
        $alertHandleFilter->setPerPage($command->getPagination()->getPerPage());

        return $alertHandleFilter;
    }
}
