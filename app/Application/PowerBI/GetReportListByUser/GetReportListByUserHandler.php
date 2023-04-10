<?php


namespace App\Application\PowerBI\GetReportListByUser;


use App\Application\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Infrastructure\DatabaseRepository\PowerBIReportsRepository;
use Illuminate\Support\Collection;

class GetReportListByUserHandler extends HandlerBase
{
    /**
     * @var PowerBIReportsRepository
     */
    protected $powerBIReportsRepository;

    /**
     * GetReportListByUserHandler constructor.
     * @param PowerBIReportsRepository $powerBIReportsRepository
     */
    public function __construct(PowerBIReportsRepository $powerBIReportsRepository)
    {
        $this->powerBIReportsRepository = $powerBIReportsRepository;
    }

    /**
     * @param CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command): Collection
    {
        /** @var GetReportListByUser $command */
        return $this->powerBIReportsRepository->all(
            $this->getFilter($command)
        );
    }

    /**
     * @param GetReportListByUser $command
     * @return \App\Domain\PowerBI\ReportFilter
     */
    private function getFilter(GetReportListByUser $command)
    {
        $filter = $this->powerBIReportsRepository->getFilter();
        $filter->setUser($command->getUser());

        return $filter;
    }
}
