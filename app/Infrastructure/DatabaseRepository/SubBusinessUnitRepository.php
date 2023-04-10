<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\SubBusinessUnitRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\SubBusinessUnit\SubBusinessUnit;
use App\Domain\SubBusinessUnit\SubBusinessUnitFilter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class SubBusinessUnitRepository
 * @package App\Infrastructure\DatabaseRepository
 */
class SubBusinessUnitRepository implements SubBusinessUnitRepositoryInterface
{

    /** @var Builder $model */
    private $model;

    /**
     * SubBusinessUnitRepository constructor.
     */
    public function __construct()
    {
        $this->model = new DbModel();
    }

    /**
     * @return SubBusinessUnitFilter
     */
    public function getSubBusinessUnitFilter(): SubBusinessUnitFilter
    {
        return new SubBusinessUnitFilter();
    }

    /**
     * @param SubBusinessUnitFilter $filter
     * @return SubBusinessUnit
     */
    public function create(SubBusinessUnitFilter $filter): SubBusinessUnit
    {
        $data = $this->model->createSubBusinessUnit(
            $this->createSubBusinessUnitFilter($filter)
        )->map(function ($subBusinessUnit) use ($filter) {

            return new SubBusinessUnit(
                $subBusinessUnit->NewSubBUID,
                $filter->getBusinessUnitId(),
                $filter->getSubBusinessUnitName()
            );

        });

        return $data->first();
    }

    /**
     * @param SubBusinessUnitFilter $filter
     * @return bool
     */
    public function update(SubBusinessUnitFilter $filter): bool
    {
        $data = $this->model->updateSubBusinessUnit($this->updateSubBusinessUnitFilter($filter));

        if (isset($data[0])) {
            $key = '1';

            if ($data[0]->$key === 1) {

                return true;
            }
        }

        return false;
    }

    /**
     * @param SubBusinessUnitFilter $filter
     * @return bool
     */
    public function delete(SubBusinessUnitFilter $filter): bool
    {
        $data = $this->model->deleteSubBusinessUnit($this->deleteSubBusinessUnitFilter($filter));

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
     * @param SubBusinessUnitFilter $filter
     * @return array
     */
    public function createSubBusinessUnitFilter(SubBusinessUnitFilter $filter): array
    {
        return [
            $filter->getBusinessUnitId(),
            $filter->getSubBusinessUnitName()
        ];
    }

    /**
     * @param SubBusinessUnitFilter $filter
     * @return array
     */
    public function updateSubBusinessUnitFilter(SubBusinessUnitFilter $filter): array
    {
        return [
            $filter->getSubBusinessUnitId(),
            $filter->getSubBusinessUnitName()
        ];
    }

    /**
     * @param SubBusinessUnitFilter $filter
     * @return array
     */
    public function deleteSubBusinessUnitFilter(SubBusinessUnitFilter $filter): array
    {
        return [
            $filter->getSubBusinessUnitId()
        ];
    }

}
