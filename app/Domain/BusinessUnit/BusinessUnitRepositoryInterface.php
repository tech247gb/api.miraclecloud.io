<?php

namespace App\Domain\BusinessUnit;

use App\Contract\Core\PaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface BusinessUnitRepositoryInterface
 * @package App\Domain\BusinessUnit
 */
interface BusinessUnitRepositoryInterface
{

    /**
     * @return BusinessUnitFilter
     */
    public function getBusinessUnitRepositoryFilter(): BusinessUnitFilter;

    /**
     * @param BusinessUnitFilter $filter
     * @return BusinessUnit
     */
    public function create(BusinessUnitFilter $filter): BusinessUnit;

    /**
     * @param BusinessUnitFilter $filter
     * @return bool
     */
    public function update(BusinessUnitFilter $filter): bool;

    /**
     * @param BusinessUnitFilter $filter
     * @return bool
     */
    public function delete(BusinessUnitFilter $filter): bool;

}
