<?php


namespace App\Application\BusinessUnit\BusinessUnitCreate;


use App\Application\HandlerBase;
use App\Contract\CommandBus\BusinessUnit\BusinessUnitCreateCommandInterface;
use App\Contract\CommandBus\BusinessUnit\BusinessUnitCreateHandlerInterface;
use App\Domain\BusinessUnit\BusinessUnit;
use App\Domain\BusinessUnit\BusinessUnitFilter;
use App\Domain\BusinessUnit\BusinessUnitRepositoryInterface;
use App\Domain\Client\ClientRepositoryInterface;
use App\Exceptions\Client\ClientSearchExceptions;

/**
 * Class BusinessUnitCreateHandler
 * @package App\Application\BusinessUnit\BusinessUnitCreate
 *
 * @property BusinessUnitRepositoryInterface $businessUnitRepository
 * @property ClientRepositoryInterface $clientRepository
 */
class BusinessUnitCreateHandler extends HandlerBase implements BusinessUnitCreateHandlerInterface
{

    /**
     * @var BusinessUnitRepositoryInterface $businessUnitRepository
     */
    private $businessUnitRepository;

    /**
     * @var ClientRepositoryInterface $clientRepository
     */
    private $clientRepository;

    /**
     * BusinessUnitCreateHandler constructor.
     * @param BusinessUnitRepositoryInterface $businessUnitRepository
     * @param ClientRepositoryInterface $clientRepository
     */
    public function __construct(
        BusinessUnitRepositoryInterface $businessUnitRepository,
        ClientRepositoryInterface $clientRepository
    ) {
        $this->businessUnitRepository = $businessUnitRepository;
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param BusinessUnitCreateCommandInterface $command
     * @return array
     * @throws ClientSearchExceptions
     */
    public function work(BusinessUnitCreateCommandInterface $command): BusinessUnit
    {
        if (!$client = $this->clientRepository->byId($command->getClientId())) {

            throw new ClientSearchExceptions($command->getClientId());
        }

        return $this->businessUnitRepository->create(
            $this->createBusinessUnitFilter($command)
        );
    }

    /**
     * @param BusinessUnitCreateCommandInterface $command
     * @return BusinessUnitFilter
     */
    private function createBusinessUnitFilter(BusinessUnitCreateCommandInterface &$command): BusinessUnitFilter
    {
        return $this->businessUnitRepository
            ->getBusinessUnitRepositoryFilter()
            ->setClientId($command->getClientId())
            ->setBusinessUnitName($command->getBusinessUnitName());
    }

}
