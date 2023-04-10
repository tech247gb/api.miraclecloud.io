<?php


namespace App\Contract\Repository;


use App\Domain\Vendor\VendorFilter;
use Illuminate\Support\Collection;

interface VendorRepositoryInterface
{

    /**
     * @return VendorFilter
     */
    public function getVendorFilter(): VendorFilter;

    /**
     * @param VendorFilter $filter
     * @return Collection
     */
    public function getAll(VendorFilter $filter): Collection;

}
