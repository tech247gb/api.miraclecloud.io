<?php


namespace App\Contract\Repository;


use App\Domain\Tag\Tag;
use App\Domain\Tag\TagFilter;
use Illuminate\Support\Collection;

interface TagRepositoryInterface
{

    /**
     * @param TagFilter $filter
     * @return Collection
     */
    public function all(TagFilter $filter): Collection;

    /**
     * @return TagFilter
     */
    public function getTagFilter(): TagFilter;

    /**
     * @param TagFilter $filter
     * @return Collection|null
     */
    public function byTagKey(TagFilter $filter): ?Collection;

}
