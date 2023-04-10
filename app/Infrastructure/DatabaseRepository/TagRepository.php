<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\TagRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\Tag\Tag;
use App\Domain\Tag\TagFilter;
use Illuminate\Support\Collection;

class TagRepository implements TagRepositoryInterface
{

    /** @var DbModel $model */
    private $model;

    /**
     * TagRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param TagFilter $filter
     * @return Collection
     */
    public function all(TagFilter $filter): Collection
    {
        return $this->mapListAll(
            $this->model->getTagList($this->createAllFilter($filter))
        );
    }

    /**
     * @param TagFilter $filter
     * @return Collection|null
     */
    public function byTagKey(TagFilter $filter): ?Collection
    {
        return $this->model->getTagsByTagKey($this->createFilterByTagKey($filter))->map(function ($tag) {

            $tagModel = new Tag();
            $tagModel->setKey($tag->Key);
            $tagModel->setValue($tag->Value);

            return $tagModel;

        });
    }

    /**
     * @param TagFilter $filter
     * @return array
     */
    private function createAllFilter(TagFilter $filter): array
    {
        return [
            $filter->getProductId(),
            $filter->getEntityTypeId(),
            $filter->getResourceId(),
            $filter->getTagKey()
        ];
    }

    /**
     * @param Collection $tags
     * @return Collection
     */
    private function mapListAll(Collection $tags): Collection
    {
        return $tags->map(function ($tag) {

            $tagModel = new Tag();
            $tagModel->setId($tag->TagID);
            $tagModel->setKey($tag->TagKey);
            $tagModel->setValue($tag->TagValue);

            return $tagModel;
        });
    }

    /**
     * @param TagFilter $filter
     * @return array
     */
    private function createFilterByTagKey(TagFilter $filter): array
    {
        return [
            $filter->getTagKey()
        ];
    }

    /**
     * @return TagFilter
     */
    public function getTagFilter(): TagFilter
    {
        return new TagFilter();
    }

}
