<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\ComparisonTypeRepositoryInterface;
use App\Domain\ComparisonType\ComparisonType;
use App\Domain\Dashboard\DbModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ComparisonTypeRepository implements ComparisonTypeRepositoryInterface
{

    /** @var Builder $model */
    private $model;

    /**
     * ComparisonTypeRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->mapListAll($this->model->getComparisonTypesList());
    }

    /**
     * @param Collection $comparisonTypes
     * @return Collection
     */
    private function mapListAll(Collection $comparisonTypes): Collection
    {
        return $comparisonTypes->map(function ($comparisonType) {

            $comparisonTypeModel = new ComparisonType();
            $comparisonTypeModel->setId($comparisonType->ComparisonTypeID);
            $comparisonTypeModel->setName($comparisonType->ComparisonName);

            return $comparisonTypeModel;
        });
    }
}
