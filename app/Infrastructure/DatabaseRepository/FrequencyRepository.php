<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\FrequencyRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\Frequency\Frequency;
use App\Domain\Frequency\FrequencyFilter;
use Illuminate\Support\Collection;

class FrequencyRepository implements FrequencyRepositoryInterface
{

    /** @var DbModel $model */
    private $model;

    /**
     * FrequencyRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param FrequencyFilter $filter
     * @return Collection
     */
    public function getFrequencyListByAlertTypeId(FrequencyFilter $filter): Collection
    {
        return $this->mapList(
            $this->model->getFrequencyListByAlertTypeId($this->filterFrequencyByAlertTypeId($filter))
        );
    }

    /**
     * @param Collection $frequencies
     * @return Collection
     */
    private function mapList(Collection $frequencies): Collection
    {
        return $frequencies->map(function ($frequency) {

            $frequencyModel = new Frequency();
            $frequencyModel->setId($frequency->FreqUencyID);
            $frequencyModel->setName($frequency->Name);

            return $frequencyModel;
        });
    }

    /**
     * @param FrequencyFilter $filter
     * @return array
     */
    private function filterFrequencyByAlertTypeId(FrequencyFilter $filter): array
    {
        return [
            $filter->getAlertTypeId()
        ];
    }

    /**
     * @return FrequencyFilter
     */
    public function getFrequencyFilter(): FrequencyFilter
    {
        return new FrequencyFilter();
    }

}
