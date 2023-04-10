<?php


namespace App\Application\SubBusinessUnit\SubBusinessUnitDelete;


use App\Application\HandlerBase;
use App\Contract\CommandBus\SubBusinessUnit\SubBusinessUnitDeleteCommandInterface;
use App\Contract\CommandBus\SubBusinessUnit\SubBusinessUnitDeleteHandlerInterface;
use App\Contract\Repository\SubBusinessUnitRepositoryInterface;
use App\Domain\SubBusinessUnit\SubBusinessUnitFilter;
use App\Exceptions\SubBusinessUnit\SubBusinessUnitDeleteException;

/**
 * Class SubBusinessUnitDeleteHandler
 * @package App\Application\SubBusinessUnit\SubBusinessUnitDelete
 *
 * @property SubBusinessUnitRepositoryInterface $subBusinessUnitRepository
 */
class SubBusinessUnitDeleteHandler extends HandlerBase implements SubBusinessUnitDeleteHandlerInterface
{

    /**
     * @var SubBusinessUnitRepositoryInterface $subBusinessUnitRepository
     */
    private $subBusinessUnitRepository;

    /**
     * SubBusinessUnitDeleteHandler constructor.
     * @param SubBusinessUnitRepositoryInterface $subBusinessUnitRepository
     */
    public function __construct(SubBusinessUnitRepositoryInterface $subBusinessUnitRepository)
    {
        $this->subBusinessUnitRepository = $subBusinessUnitRepository;
    }

    /**
     * @param SubBusinessUnitDeleteCommandInterface $command
     * @throws SubBusinessUnitDeleteException
     */
    public function work(SubBusinessUnitDeleteCommandInterface $command): void
    {
        $data =  $this->deleteSubBusinessUnitFilter($command);

        if (!$this->subBusinessUnitRepository->delete($data)) {

            throw new SubBusinessUnitDeleteException($command->getSubBusinessUnitId());
        }
    }

    /**
     * @param SubBusinessUnitDeleteCommandInterface $command
     * @return SubBusinessUnitFilter
     */
    private function deleteSubBusinessUnitFilter(SubBusinessUnitDeleteCommandInterface $command): SubBusinessUnitFilter
    {
        return $this->subBusinessUnitRepository
            ->getSubBusinessUnitFilter()
            ->setSubBusinessUnitId($command->getSubBusinessUnitId());
    }

}
