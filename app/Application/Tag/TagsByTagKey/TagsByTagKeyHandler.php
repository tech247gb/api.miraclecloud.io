<?php

declare(strict_types = 1);

namespace App\Application\Tag\TagsByTagKey;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\TagRepositoryInterface;
use App\Domain\Tag\TagFilter;
use Illuminate\Support\Collection;

/**
 * Class TagsByTagKeyHandler
 * @package App\Application\Tag\TagsByTagKeyHandler
 *
 * @property TagRepositoryInterface $tagRepository
 */
class TagsByTagKeyHandler extends HandlerBase
{

    /**
     * @var TagRepositoryInterface $tagRepository
     */
    private $tagRepository;

    /**
     * TagValuesByTagKeyHandler constructor.
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param TagsByTagKey|CommandInterface $command
     * @return Collection|null
     */
    protected function work(CommandInterface $command)
    {
        return $this->tagRepository->byTagKey($this->getFilter($command));
    }

    /**
     * @param TagsByTagKey $command
     * @return TagFilter
     */
    private function getFilter(TagsByTagKey &$command): TagFilter
    {
        return $this->tagRepository->getTagFilter()->setTagKey($command->getTagKey());
    }

}
