<?php


namespace App\Contract\Repository;


use App\Domain\Frequency\Frequency;
use App\Domain\Frequency\FrequencyFilter;
use Illuminate\Support\Collection;

interface FrequencyRepositoryInterface
{

    /**
     * @param FrequencyFilter $filter
     * @return Collection
     */
    public function getFrequencyListByAlertTypeId(FrequencyFilter $filter): Collection;

    /**
     * @return FrequencyFilter
     */
    public function getFrequencyFilter(): FrequencyFilter;

}
