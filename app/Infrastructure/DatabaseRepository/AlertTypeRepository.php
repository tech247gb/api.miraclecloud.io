<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\AlertTypeRepositoryInterface;
use App\Domain\AlertType\AlertType;
use App\Domain\Dashboard\DbModel;
use Illuminate\Support\Collection;

class AlertTypeRepository implements AlertTypeRepositoryInterface
{
    /** @var DbModel $model */
    private $model;

    /**
     * AlertTypeRepository constructor.
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
        return $this->mapList($this->model->getAlertTypeList());
    }

    /**
     * @param Collection $alertTypes
     * @return Collection
     */
    private function mapList(Collection $alertTypes): Collection
    {
        return $alertTypes->map(function ($alertType) {

            $alertTypeModel = new AlertType();
            $alertTypeModel->setId($alertType->AlertTypeID);
            $alertTypeModel->setName($alertType->AlertTypeName);

            return $alertTypeModel;
        });
    }

}
