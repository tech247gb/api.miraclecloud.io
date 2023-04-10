<?php


namespace App\Application\BusinessUnit\BusinessUnitUpdate;


use App\Application\HandlerBase;
use App\Contract\CommandBus\BusinessUnit\BusinessUnitUpdateCommandInterface;
use App\Contract\CommandBus\BusinessUnit\BusinessUnitUpdateHandlerInterface;
use App\Domain\BusinessUnit\BusinessUnitFilter;
use App\Domain\BusinessUnit\BusinessUnitRepositoryInterface;
use App\Exceptions\BusinessUnit\BusinessUnitUpdateException;

/**
 * Class BusinessUnitUpdateHandler
 * @package App\Application\BusinessUnit\BusinessUnitUpdate
 *
 * @property BusinessUnitRepositoryInterface $businessUnitRepository
 */
class BusinessUnitUpdateHandler extends HandlerBase implements BusinessUnitUpdateHandlerInterface
{

    /**
     * @var BusinessUnitRepositoryInterface $businessUnitRepository
     */
    private $businessUnitRepository;

    /**
     * BusinessUnitUpdateHandler constructor.
     * @param BusinessUnitRepositoryInterface $businessUnitRepository
     */
    public function __construct(BusinessUnitRepositoryInterface $businessUnitRepository)
    {
        $this->businessUnitRepository = $businessUnitRepository;
    }

    /**
     * @param BusinessUnitUpdateCommandInterface $command
     * @return void
     * @throws BusinessUnitUpdateException
     */
    public function work(BusinessUnitUpdateCommandInterface $command): void
    {
        $data = $this->updateBusinessUnitFilter($command);

        if (!$this->businessUnitRepository->update($data)) {

            throw new BusinessUnitUpdateException($command->getBusinessUnitId());
        }
    }

    /**
     * @param BusinessUnitUpdateCommandInterface $command
     * @return BusinessUnitFilter
     */
    private function updateBusinessUnitFilter(BusinessUnitUpdateCommandInterface &$command): BusinessUnitFilter
    {
        return $this->businessUnitRepository
            ->getBusinessUnitRepositoryFilter()
            ->setBusinessUnitId($command->getBusinessUnitId())
            ->setBusinessUnitName($command->getBusinessUnitName());
    }

}
