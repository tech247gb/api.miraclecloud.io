<?php

namespace App\Application\BusinessUnit;

use App\Application\HandlerBase;
use App\Contract\CommandBus\BusinessUnit\BusinessUnitCommandInterface;
use App\Contract\CommandBus\BusinessUnit\BusinessUnitHandlerInterface;
use App\Domain\BusinessUnit\BusinessUnitFilter;
use App\Domain\BusinessUnit\BusinessUnitRepositoryInterface;
use App\Infrastructure\DatabaseRepository\BusinessUnitRepository;

/**
 * Class BusinessUnitHandler
 * @package App\Application\Dashboard\BusinessUnit
 */
class BusinessUnitHandler extends HandlerBase implements BusinessUnitHandlerInterface
{
    /** @var BusinessUnitRepository $businessUnitRepository */
    private $businessUnitRepository;

    /**
     * BusinessUnitHandler constructor.
     * @param BusinessUnitRepository $businessUnitRepository
     */
    public function __construct(BusinessUnitRepository $businessUnitRepository)
    {
        $this->businessUnitRepository = $businessUnitRepository;
    }

    /**
     * @param BusinessUnitCommandInterface $command
     * @return array
     */
    public function work(BusinessUnitCommandInterface $command): array
    {

        return $this->businessUnitRepository->all($this->createFilterWithPropertiesData($command));
    }

    /**
     * @param BusinessUnitCommandInterface $command
     * @return BusinessUnitFilter
     */
    private function createFilterWithPropertiesData(BusinessUnitCommandInterface $command): BusinessUnitFilter
    {
        return $this->businessUnitRepository
            ->getBusinessUnitRepositoryFilter();
    }

}
