<?php


namespace App\Application\Service\ServiceList;


use App\Application\HandlerBase;
use App\Contract\CommandBus\Service\ServiceListCommandInterface;
use App\Contract\CommandBus\Service\ServiceListHandlerInterface;
use App\Contract\Repository\ServiceRepositoryInterface;
use App\Domain\Service\ServiceFilter;
use Illuminate\Support\Collection;

/**
 * Class ServiceListHandler
 * @package App\Application\Service\ServiceList
 *
 * @property ServiceRepositoryInterface $serviceRepository
 */
class ServiceListHandler extends HandlerBase implements ServiceListHandlerInterface
{

    /**
     * @var ServiceRepositoryInterface $serviceRepository
     */
    private $serviceRepository;

    /**
     * ServiceListHandler constructor.
     * @param ServiceRepositoryInterface $serviceRepository
     */
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @param ServiceListCommandInterface $command
     * @return array
     */
    public function work(ServiceListCommandInterface $command): array
    {
        return $this->serviceRepository->getAll(
            $this->createServiceFilter($command)
        );
    }

    /**
     * @param ServiceListCommandInterface $command
     * @return ServiceFilter
     */
    private function createServiceFilter(ServiceListCommandInterface $command): ServiceFilter
    {
        return $this->serviceRepository
            ->getServiceFilter()
            ->setClientId($command->getClientId());
    }

}
