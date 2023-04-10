<?php


namespace App\Contract\Repository;


use App\Domain\SubBusinessUnit\SubBusinessUnit;
use App\Domain\SubBusinessUnit\SubBusinessUnitFilter;

/**
 * Interface SubBusinessUnitRepositoryInterface
 * @package App\Contract\Repository
 */
interface SubBusinessUnitRepositoryInterface
{

    /**
     * @return SubBusinessUnitFilter
     */
    public function getSubBusinessUnitFilter(): SubBusinessUnitFilter;

    /**
     * @param SubBusinessUnitFilter $filter
     * @return SubBusinessUnit
     */
    public function create(SubBusinessUnitFilter $filter): SubBusinessUnit;

    /**
     * @param SubBusinessUnitFilter $filter
     * @return bool
     */
    public function update(SubBusinessUnitFilter $filter): bool;

    /**
     * @param SubBusinessUnitFilter $filter
     * @return bool
     */
    public function delete(SubBusinessUnitFilter $filter): bool;

}
