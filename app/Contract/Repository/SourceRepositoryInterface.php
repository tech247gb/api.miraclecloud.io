<?php


namespace App\Contract\Repository;


use App\Domain\Source\SourceFilter;
use Illuminate\Support\Collection;

interface SourceRepositoryInterface
{

    /**
     * @param SourceFilter $filter
     * @return Collection
     */
    public function all(SourceFilter $filter): Collection;

    /**
     * @return SourceFilter
     */
    public function getSourceFilter(): SourceFilter;

}
