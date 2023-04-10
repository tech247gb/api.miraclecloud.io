<?php


namespace App\Application\Vendor\VendorList;


use App\Application\HandlerBase;
use App\Contract\CommandBus\Vendor\VendorListCommandInterface;
use App\Contract\CommandBus\Vendor\VendorListHandlerInterface;
use App\Contract\Repository\VendorRepositoryInterface;
use App\Domain\Vendor\VendorFilter;
use Illuminate\Support\Collection;

/**
 * Class VendorListHandler
 * @package App\Application\Vendor\VendorList
 *
 * @property VendorRepositoryInterface $vendorRepository
 */
class VendorListHandler extends HandlerBase implements VendorListHandlerInterface
{

    /**
     * @var VendorRepositoryInterface $vendorRepository
     */
    private $vendorRepository;

    /**
     * VendorListHandler constructor.
     * @param VendorRepositoryInterface $vendorRepository
     */
    public function __construct(VendorRepositoryInterface $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    /**
     * @param VendorListCommandInterface $command
     * @return Collection
     */
    public function work(VendorListCommandInterface $command): Collection
    {
        return $this->vendorRepository->getAll(
            $this->createVendorFilter($command)
        );
    }

    /**
     * @param VendorListCommandInterface $command
     * @return VendorFilter
     */
    private function createVendorFilter(VendorListCommandInterface $command): VendorFilter
    {
        return $this->vendorRepository
            ->getVendorFilter()
            ->setClientId($command->getClientId());
    }

}
