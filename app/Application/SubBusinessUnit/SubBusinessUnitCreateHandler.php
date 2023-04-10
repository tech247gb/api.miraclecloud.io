<?php


namespace App\Application\SubBusinessUnit;


use App\Application\HandlerBase;
use App\Contract\CommandBus\SubBusinessUnit\SubBusinessUnitCreateCommandInterface;
use App\Contract\CommandBus\SubBusinessUnit\SubBusinessUnitCreateHandlerInterface;
use App\Contract\Repository\SubBusinessUnitRepositoryInterface;
use App\Domain\SubBusinessUnit\SubBusinessUnit;
use App\Domain\SubBusinessUnit\SubBusinessUnitFilter;

/**
 * Class SubBusinessUnitCreateHandler
 * @package App\Application\SubBusinessUnit
 *
 * @property SubBusinessUnitRepositoryInterface $subBusinessUnitRepository
 */
class SubBusinessUnitCreateHandler extends HandlerBase implements SubBusinessUnitCreateHandlerInterface
{

    /**
     * @var SubBusinessUnitRepositoryInterface $subBusinessUnitRepository
     */
    private $subBusinessUnitRepository;

    /**
     * SubBusinessUnitCreateHandler constructor.
     * @param SubBusinessUnitRepositoryInterface $subBusinessUnitRepository
     */
    public function __construct(SubBusinessUnitRepositoryInterface $subBusinessUnitRepository)
    {
        $this->subBusinessUnitRepository = $subBusinessUnitRepository;
    }

    /**
     * @param SubBusinessUnitCreateCommandInterface $command
     * @return SubBusinessUnit
     */
    public function work(SubBusinessUnitCreateCommandInterface $command): SubBusinessUnit
    {
        return $this->subBusinessUnitRepository->create(
            $this->createSubBusinessUnitFilter($command)
        );
    }

    /**
     * @param SubBusinessUnitCreateCommandInterface $command
     * @return SubBusinessUnitFilter
     */
    private function createSubBusinessUnitFilter(SubBusinessUnitCreateCommandInterface &$command): SubBusinessUnitFilter
    {
        return $this->subBusinessUnitRepository
            ->getSubBusinessUnitFilter()
            ->setBusinessUnitId($command->getBusinessUnitId())
            ->setSubBusinessUnitName($command->getSubBusinessUnitName());
    }

}
