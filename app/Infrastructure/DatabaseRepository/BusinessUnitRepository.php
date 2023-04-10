<?php

namespace App\Infrastructure\DatabaseRepository;

use App\Domain\BusinessUnit\BusinessUnit;
use App\Domain\BusinessUnit\BusinessUnitFilter;
use App\Domain\BusinessUnit\BusinessUnitRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class BusinessUnitRepository
 * @package App\Infrastructure\DatabaseRepository
 */
class BusinessUnitRepository implements BusinessUnitRepositoryInterface
{
    /** @var Builder $model */
    private $model;

    /**
     * BusinessUnitRepository constructor.
     */
    public function __construct()
    {
        $this->model = new DbModel();
    }

    /**
     * @param BusinessUnitFilter $filter
     * @return array
     */
    public function all(BusinessUnitFilter $filter): array
    {
        return $this->model->businessUnits($this->filter($filter))->all();
    }

    /**
     * @param BusinessUnitFilter $filter
     * @return BusinessUnit
     */
    public function create(BusinessUnitFilter $filter): BusinessUnit
    {
        $data = $this->model->createBusinessUnit(
            $this->addBusinessUnitFilter($filter)
        )->map(function ($businessUnit) use ($filter) {

            return new BusinessUnit($businessUnit->NewBUID, $filter->getClientId(), $filter->getBusinessUnitName());
        });

        return $data->first();
    }

    /**
     * @param BusinessUnitFilter $filter
     * @return bool
     */
    public function update(BusinessUnitFilter $filter): bool
    {
        $data = $this->model->updateBusinessUnit($this->updateBusinessUnitFilter($filter));

        if (isset($data[0])) {
            $key = '1';

            if ($data[0]->$key === 1) {

                return true;
            }
        }

        return false;

    }

    /**
     * @param BusinessUnitFilter $filter
     * @return bool
     */
    public function delete(BusinessUnitFilter $filter): bool
    {
        $data = $this->model->deleteBusinessUnit($this->deleteBusinessUnitFilter($filter));

        if (isset($data[0])) {

            $keySuccess = '1';
            $keyError = '0';

            if (isset($data[0]->$keySuccess)) {

                if ($data[0]->$keySuccess === 1) {

                    return true;
                }
            }

            if (isset($data[0]->$keyError)) {

                if ($data[0]->$keyError === 0) {

                    return false;
                }
            }

        }

        return false;
    }

    /**
     * @param BusinessUnitFilter $filter
     * @return array
     */
    private function filter(BusinessUnitFilter $filter)
    {
        return [];
    }

    /**
     * @return BusinessUnitFilter
     */
    public function getBusinessUnitRepositoryFilter(): BusinessUnitFilter
    {
        return new BusinessUnitFilter();
    }

    /**
     * @param BusinessUnitFilter $filter
     * @return array
     */
    public function addBusinessUnitFilter(BusinessUnitFilter $filter): array
    {
        return [
            $filter->getClientId(),
            $filter->getBusinessUnitName()
        ];
    }

    /**
     * @param BusinessUnitFilter $filter
     * @return array
     */
    public function updateBusinessUnitFilter(BusinessUnitFilter $filter): array
    {
        return [
            $filter->getBusinessUnitId(),
            $filter->getBusinessUnitName()
        ];
    }

    /**
     * @param BusinessUnitFilter $filter
     * @return array
     */
    public function deleteBusinessUnitFilter(BusinessUnitFilter $filter): array
    {
        return [
            $filter->getBusinessUnitId()
        ];
    }

    /**
     * @param $clientId
     * @param $status
     * @return \Illuminate\Support\Collection
     */
    public function getSubBusinessUnitsList($clientId, $status)
    {
        return $this->model->getSubBusinessUnitsList([$clientId, $status]);
    }

    /**
     * @param $clientId
     * @param $statusId
     * @return \Illuminate\Support\Collection
     */
    public function getBusinessUnitsList($clientId, $statusId)
    {
        return $this->model->businessUnits([$clientId, $statusId]);
    }

    /**
     * @param $clientId
     * @return \Illuminate\Support\Collection
     */
    public function getVendorsList($clientId)
    {
        return $this->model->getVendorsList([$clientId]);
    }

}
