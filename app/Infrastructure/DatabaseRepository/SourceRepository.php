<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\SourceRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\Source\Source;
use App\Domain\Source\SourceFilter;
use Illuminate\Support\Collection;

class SourceRepository implements SourceRepositoryInterface
{

    /** @var DbModel $model */
    private $model;

    /**
     * ProductRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param SourceFilter $filter
     * @return Collection
     */
    public function all(SourceFilter $filter): Collection
    {
        return $this->mapListAll($this->model->getSourceList($this->filterAll($filter)));
    }

    /**
     * @return SourceFilter
     */
    public function getSourceFilter(): SourceFilter
    {
        return new SourceFilter();
    }

    /**
     * @param SourceFilter $filter
     * @return array
     */
    private function filterAll(SourceFilter $filter): array
    {
        return [
            $filter->getAlertTypeId()
        ];
    }

    /**
     * @param Collection $sources
     * @return Collection
     */
    private function mapListAll(Collection $sources): Collection
    {
        return $sources->map(function ($source) {

            $sourceModel = new Source();
            $sourceModel->setId($source->AlertSourceID);
            $sourceModel->setName($source->AlertSourceName);

            return $sourceModel;
        });
    }

}
