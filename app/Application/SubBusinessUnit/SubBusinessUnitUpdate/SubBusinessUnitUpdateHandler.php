<?php


namespace App\Application\SubBusinessUnit\SubBusinessUnitUpdate;


use App\Application\HandlerBase;
use App\Contract\CommandBus\SubBusinessUnit\SubBusinessUnitUpdateCommandInterface;
use App\Contract\CommandBus\SubBusinessUnit\SubBusinessUnitUpdateHandlerInterface;
use App\Contract\Repository\SubBusinessUnitRepositoryInterface;
use App\Domain\SubBusinessUnit\SubBusinessUnitFilter;
use App\Exceptions\SubBusinessUnit\SubBusinessUnitUpdateException;

/**
 * Class SubBusinessUnitUpdateHandler
 * @package App\Application\SubBusinessUnit\SubBusinessUnitUpdate
 *
 * @property SubBusinessUnitRepositoryInterface $subBusinessUnitRepository
 */
class SubBusinessUnitUpdateHandler extends HandlerBase implements SubBusinessUnitUpdateHandlerInterface
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
     * @param SubBusinessUnitUpdateCommandInterface $command
     * @throws SubBusinessUnitUpdateException
     */
    public function work(SubBusinessUnitUpdateCommandInterface $command): void
    {
        $data = $this->updateSubBusinessUnitFilter($command);

        if (!$this->subBusinessUnitRepository->update($data)) {

            throw new SubBusinessUnitUpdateException($command->getSubBusinessUnitId());
        }
    }

    /**
     * @param SubBusinessUnitUpdateCommandInterface $command
     * @return SubBusinessUnitFilter
     */
    private function updateSubBusinessUnitFilter(SubBusinessUnitUpdateCommandInterface &$command): SubBusinessUnitFilter
    {
        return $this->subBusinessUnitRepository
            ->getSubBusinessUnitFilter()
            ->setSubBusinessUnitId($command->getSubBusinessUnitId())
            ->setSubBusinessUnitName($command->getSubBusinessUnitName());
    }

}
