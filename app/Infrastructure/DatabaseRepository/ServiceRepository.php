<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\ServiceRepositoryInterface;
use App\Domain\Dashboard\DbModel;
use App\Domain\Service\Service;
use App\Domain\Service\ServiceFilter;
use Illuminate\Database\Eloquent\Builder;

class ServiceRepository implements ServiceRepositoryInterface
{

    /** @var Builder $model */
    private $model;

    /**
     * DashboardRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return ServiceFilter
     */
    public function getServiceFilter(): ServiceFilter
    {
        return new ServiceFilter();
    }

    /**
     * @param ServiceFilter $filter
     * @return array
     */
    public function getAll(ServiceFilter $filter): array
    {

        $data = $this->model->getServiceList(
            $this->allServiceFilter($filter)
        )->map(function ($service) {

            return new Service($service->id, $service->name);
        });

        return $data->all();
    }

    /**
     * @param ServiceFilter $filter
     * @return array
     */
    private function allServiceFilter(ServiceFilter $filter): array
    {
        return [
            $filter->getClientId()
        ];
    }

}
