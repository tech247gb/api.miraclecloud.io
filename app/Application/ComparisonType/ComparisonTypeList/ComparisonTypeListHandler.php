<?php


namespace App\Application\ComparisonType\ComparisonTypeList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\ComparisonTypeRepositoryInterface;
use Illuminate\Support\Collection;

class ComparisonTypeListHandler extends HandlerBase
{

    /**
     * @var ComparisonTypeRepositoryInterface $comparisonTypeRepository
     */
    private $comparisonTypeRepository;

    /**
     * ComparisonTypeListHandler constructor.
     * @param ComparisonTypeRepositoryInterface $comparisonTypeRepository
     */
    public function __construct(ComparisonTypeRepositoryInterface $comparisonTypeRepository)
    {
        $this->comparisonTypeRepository = $comparisonTypeRepository;
    }

    /**
     * @param ComparisonTypeList|CommandInterface $command
     * @return Collection
     */
    public function work(CommandInterface $command): Collection
    {
        return $this->comparisonTypeRepository->all();
    }

}
