<?php

declare(strict_types = 1);

namespace App\Infrastructure\DatabaseRepository;


use App\Domain\AlertStatus\{
    AlertStatus,
    AlertStatusFilter
};
use App\Domain\Dashboard\DbModel;
use Illuminate\Support\Collection;

/**
 * Class AlertStatusRepository
 * @package App\Infrastructure\DatabaseRepository
 *
 * @property DbModel $model
 */
class AlertStatusRepository
{

    /**
     * @var DbModel $model
     */
    private $model;

    /**
     * AlertStatusRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return AlertStatusFilter
     */
    public function getFilter()
    {
        return new AlertStatusFilter();
    }

    /**
     * @return Collection|null
     */
    public function all(): ?Collection
    {
        return $this->mapList($this->model->getAlertStatusList());
    }

    /**
     * @param Collection|null $alertStatusList
     *
     * @return Collection
     */
    private function mapList(?Collection $alertStatusList): Collection
    {
        return $alertStatusList->map(function ($alertStatusModel) {

            $alertStatus = new AlertStatus();
            $alertStatus->setAlertStatusId($alertStatusModel->AlertStatusID);
            $alertStatus->setStatusName($alertStatusModel->StatusName);

            return $alertStatus;
        });
    }

    /**
     * @param AlertStatusFilter $alertStatusFilter
     *
     * @return bool
     */
    public function update(AlertStatusFilter $alertStatusFilter): bool
    {
        $data = $this->model->updateAlertStatus($this->filterUpdateParams($alertStatusFilter));

        if (isset($data[0])) {

            if ($data[0]->ResCode == 1) {

                return true;

            } else {

                return false;
            }

        }

        return false;
    }

    /**
     * @param AlertStatusFilter $alertStatusFilter
     *
     * @return array
     */
    private function filterUpdateParams(AlertStatusFilter $alertStatusFilter): array
    {
        return [
            $alertStatusFilter->getAlertId(),
            $alertStatusFilter->getStatusId(),
            $alertStatusFilter->getReasonId(),
            $alertStatusFilter->getUserId()
        ];
    }
}
