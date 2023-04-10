<?php


namespace App\Contract\Repository;


use App\Domain\Owner\OwnerFilter;
use Illuminate\Support\Collection;

interface OwnerRepositoryInterface
{

    /**
     * @param OwnerFilter $filter
     * @return Collection
     */
    public function all(OwnerFilter $filter): Collection;

    /**
     * @return OwnerFilter
     */
    public function getOwnerFilter(): OwnerFilter;

}
