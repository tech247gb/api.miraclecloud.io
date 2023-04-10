<?php


namespace App\Contract\Repository;



use App\Domain\Alert\AlertFilter;
use Illuminate\Support\Collection;

interface AlertRepositoryInterface
{

    /**
     * @param AlertFilter $filter
     * @return Collection
     */
    public function all(AlertFilter $filter): Collection;

    /**
     * @return AlertFilter
     */
    public function getAlertFilter(): AlertFilter;

    /**
     * @param AlertFilter $filter
     * @return bool
     */
    public function suspend(AlertFilter $filter): bool;

    /**
     * @param AlertFilter $filter
     * @return bool
     */
    public function unSuspend(AlertFilter $filter): bool;

    /**
     * @param AlertFilter $filter
     * @return bool
     */
    public function create(AlertFilter $filter): bool;

    /**
     * @param AlertFilter $filter
     * @return bool
     */
    public function delete(AlertFilter $filter): bool;

    /**
     * @return Collection
     */
    public function getTypesDescriptions(): Collection;

    /**
     * @param AlertFilter $filter
     * @return Collection
     */
    public function getAlertServiceList(AlertFilter $filter): Collection;

    /**
     * @param AlertFilter $filter
     * @return Collection
     */
    public function getExportExcelList(AlertFilter $filter): Collection;

}
