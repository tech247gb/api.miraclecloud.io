<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\VendorRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\Vendor\Vendor;
use App\Domain\Vendor\VendorFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class VendorRepository implements VendorRepositoryInterface
{

    /** @var Builder $model */
    private $model;

    /**
     * VendorRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    public function getVendorFilter(): VendorFilter
    {
        return new VendorFilter();
    }

    /**
     * @param VendorFilter $filter
     * @return Collection
     */
    public function getAll(VendorFilter $filter): Collection
    {
        return $this->model->getVendorList(
            $this->allVendorFilter($filter)
        )->map(function ($vendor) {

            return new Vendor($vendor->id, $vendor->name);
        });
    }

    /**
     * @param VendorFilter $filter
     * @return array
     */
    private function allVendorFilter(VendorFilter $filter): array
    {
        return [
            $filter->getClientId()
        ];
    }

}
