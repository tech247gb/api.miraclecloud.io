<?php

declare(strict_types = 1);

namespace App\Application\StatusReason\StatusReasonList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Domain\StatusReason\StatusReasonFilter;
use App\Infrastructure\DatabaseRepository\StatusReasonRepository;
use Illuminate\Support\Collection;

/**
 * Class StatusReasonListHandler
 * @package App\Application\StatusReason\StatusReasonList
 *
 * @property StatusReasonRepository $statusReasonRepository
 */
class StatusReasonListHandler extends HandlerBase
{

    /**
     * @var StatusReasonRepository $statusReasonRepository
     */
    private $statusReasonRepository;

    /**
     * StatusReasonListHandler constructor.
     * @param StatusReasonRepository $statusReasonRepository
     */
    public function __construct(StatusReasonRepository $statusReasonRepository)
    {
        $this->statusReasonRepository = $statusReasonRepository;
    }

    /**
     * @param StatusReasonList|CommandInterface $command
     *
     * @return Collection
     */
    protected function work(CommandInterface $command)
    {
        return $this->statusReasonRepository->all($this->getFilter($command));
    }

    /**
     * @param StatusReasonList $command
     *
     * @return StatusReasonFilter
     */
    private function getFilter(StatusReasonList &$command): StatusReasonFilter
    {
        $statusReasonFilter = $this->statusReasonRepository->getFilter();
        $statusReasonFilter->setStatusId($command->getStatusId());

        return $statusReasonFilter;
    }

}
