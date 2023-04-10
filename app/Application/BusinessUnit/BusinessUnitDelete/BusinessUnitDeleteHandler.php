<?php


namespace App\Application\BusinessUnit\BusinessUnitDelete;


use App\Application\HandlerBase;
use App\Contract\CommandBus\BusinessUnit\BusinessUnitDeleteCommandInterface;
use App\Contract\CommandBus\BusinessUnit\BusinessUnitDeleteHandlerInterface;
use App\Domain\BusinessUnit\BusinessUnitFilter;
use App\Domain\BusinessUnit\BusinessUnitRepositoryInterface;
use App\Exceptions\BusinessUnit\BusinessUnitDeleteException;

/**
 * Class BusinessUnitDeleteHandler
 * @package App\Application\BusinessUnit\BusinessUnitDelete
 *
 * @property BusinessUnitRepositoryInterface $businessUnitRepository
 */
class BusinessUnitDeleteHandler extends HandlerBase implements BusinessUnitDeleteHandlerInterface
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
     * @param BusinessUnitDeleteCommandInterface $command
     * @return void
     * @throws BusinessUnitDeleteException
     */
    public function work(BusinessUnitDeleteCommandInterface $command): void
    {
        $data = $this->deleteBusinessUnitFilter($command);

        if (!$this->businessUnitRepository->delete($data)) {

            throw new BusinessUnitDeleteException($command->getBusinessUnitId());
        }
    }

    /**
     * @param BusinessUnitDeleteCommandInterface $command
     * @return BusinessUnitFilter
     */
    private function deleteBusinessUnitFilter(BusinessUnitDeleteCommandInterface &$command): BusinessUnitFilter
    {
        return $this->businessUnitRepository
            ->getBusinessUnitRepositoryFilter()
            ->setBusinessUnitId($command->getBusinessUnitId());
    }

}
