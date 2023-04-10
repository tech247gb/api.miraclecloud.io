<?php


namespace App\Application\Tag\TagList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\TagRepositoryInterface;
use App\Domain\Tag\TagFilter;
use Illuminate\Support\Collection;

class TagListHandler extends HandlerBase
{

    /**
     * @var TagRepositoryInterface $tagRepository
     */
    private $tagRepository;

    /**
     * TagListHandler constructor.
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param TagList|CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command)
    {
        return $this->tagRepository->all($this->getFilter($command));
    }

    /**
     * @param TagList $command
     * @return TagFilter
     */
    private function getFilter(TagList $command): TagFilter
    {
        return $this->tagRepository
            ->getTagFilter()
            ->setProductId($command->getProductId())
            ->setEntityTypeId($command->getEntityTypeId())
            ->setResourceId($command->getResourceId())
            ->setTagKey($command->getTagKey());
    }

}
