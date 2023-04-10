<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\AlertRepositoryInterface;
use App\Domain\Alert\AlertFilter;
use App\Domain\Alert\Alert;
use App\Domain\Dashboard\DbModel;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AlertRepository implements AlertRepositoryInterface
{

    /** @var DbModel $model */
    private $model;

    /**
     * AlertRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param AlertFilter $filter
     * @return Collection
     */
    public function all(AlertFilter $filter): Collection
    {
        return $this->mapList($this->model->getAlertsList($this->filterAllList($filter)));
    }

    public function create(AlertFilter $filter): bool
    {
        $data = $this->model->createAlert($this->filterCreate($filter));

        if (isset($data[0])) {

            $keySuccess = 'last_insert_id()';

            if (isset($data[0]->$keySuccess) && is_int($data[0]->$keySuccess)) {

                return true;
            }
        }

        return false;

    }

    /**
     * @return Collection
     */
    public function getTypesDescriptions(): Collection
    {
        return $this->model->getAlertTypesDescriptions();
    }

    /**
     * @param Collection $alerts
     * @return Collection
     */
    private function mapList(Collection $alerts): Collection
    {

        return $alerts->map(function ($alert) {

            $alertModel = new Alert();
            $alertModel->setId($alert->AlertID);
            $alertModel->setAlertName($alert->AlertName);
            $alertModel->setAlertTypeId($alert->AlertTypeID);
            $alertModel->setAlertTypeName($alert->AlertTypeName);
            $alertModel->setAlertTypeDescription($alert->AlertTypeDescritpion);
            $alertModel->setAlertSourceId($alert->AlertSourceID);
            $alertModel->setAlertSourceName($alert->AlertSourceName);
            $alertModel->setProductId($alert->ProductID);
            $alertModel->setProductName($alert->ProductName);
            $alertModel->setEntityTypeId($alert->EntityTypeID);
            $alertModel->setEntityTypeName($alert->EntityTypeName);
            $alertModel->setEntityName($alert->EntityName);
            $alertModel->setTagKey($alert->TagKey);
            $alertModel->setTagValue($alert->TagValue);
            $alertModel->setComparisonTypeID($alert->ComparisonTypeID);
            $alertModel->setComparisonName($alert->ComparisonName);
            $alertModel->setPercentageOfComparison($alert->PercentageOfComparison);
            $alertModel->setWithinMonth($alert->WithinMonth);
            $alertModel->setWithinDay($alert->WithinDay);
            $alertModel->setOwnerID($alert->OwnerID);
            $alertModel->setOwnerName($alert->OwnerName);
            $alertModel->setOwnerEmail($alert->OwnerMail);
            $alertModel->setEmailCC(
                $alert->EmailCC ? explode(',', $alert->EmailCC) : null
            );
            $alertModel->setCondition($alert->Condition);
            $alertModel->setCreationDate($alert->CreationDate);
            $alertModel->setStatusId($alert->StatusID);
            $alertModel->setStatusName($alert->StatusName);
            $alertModel->setEntityId($alert->EntityID);

            return $alertModel;
        });

    }

    /**
     * @param AlertFilter $filter
     * @return bool
     */
    public function suspend(AlertFilter $filter): bool
    {
        $data = $this->model->suspendAlert($this->filterSuspend($filter));

        if (isset($data[0])) {

            $keySuccess = '1';
            $keyError = '0';

            if (isset($data[0]->$keySuccess) && $data[0]->$keySuccess === 1) {

                return true;
            }

            if (isset($data[0]->$keyError) && $data[0]->$keyError === 0) {

                return false;
            }

        }

        return false;
    }

    /**
     * @param AlertFilter $filter
     * @return bool
     */
    public function unSuspend(AlertFilter $filter): bool
    {
        $data = $this->model->unSuspendAlert($this->filterUnSuspend($filter));

        if (isset($data[0])) {

            $keySuccess = '1';
            $keyError = '0';

            if (isset($data[0]->$keySuccess) && $data[0]->$keySuccess === 1) {

                return true;
            }

            if (isset($data[0]->$keyError) && $data[0]->$keyError === 0) {

                return false;
            }

        }

        return false;
    }

    /**
     * @param AlertFilter $filter
     * @return bool
     */
    public function delete(AlertFilter $filter): bool
    {
        $data = $this->model->deleteAlert($this->filterDelete($filter));

        if (isset($data[0])) {

            $keySuccess = '1';
            $keyError = '0';

            if (isset($data[0]->$keySuccess) && $data[0]->$keySuccess === 1) {

                return true;
            }

            if (isset($data[0]->$keyError) && $data[0]->$keyError === 0) {

                return false;
            }

        }

        return false;

    }

    /**
     * @param AlertFilter $filter
     * @return Collection
     */
    public function getExportExcelList(AlertFilter $filter): Collection
    {
        return $this->mapExportExcelList($this->model->getAlertsList($this->filterExportExcel($filter)));
    }

    /**
     * @param AlertFilter $filter
     * @return array
     */
    private function filterExportExcel(AlertFilter $filter): array
    {
        return [
            $filter->getClientId(),
            implode(',', $filter->getAlertIds())
        ];
    }

    /**
     * @param Collection $alerts
     * @return Collection
     */
    private function mapExportExcelList(Collection $alerts): Collection
    {
        return $alerts->map(function ($alert) {

            return [
                $alert->AlertName,
                $alert->AlertTypeName,
                $alert->AlertSourceName,
                $alert->OwnerName,
                $alert->OwnerMail,
                $alert->Condition,
                date('d/m/Y', strtotime($alert->CreationDate)),
                $alert->StatusName
            ];

        });
    }

    /**
     * @param AlertFilter $filter
     * @return Collection
     */
    public function getAlertServiceList(AlertFilter $filter): Collection
    {
        return $this->model->getAlertServiceList($this->filterServiceList($filter));
    }

    /**
     * @param AlertFilter $filter
     * @return array
     */
    private function filterServiceList(AlertFilter $filter): array
    {
        return [
            $filter->getProductId()
        ];
    }

    /**
     * @param AlertFilter $filter
     * @return array
     */
    private function filterAllList(AlertFilter $filter): array
    {
        return [
            $filter->getClientId(),
            null
        ];
    }

    /**
     * @param AlertFilter $filter
     * @return array
     */
    private function filterCreate(AlertFilter $filter): array
    {
        return [
            $filter->getClientId(),
            $filter->getAlertName(),
            $filter->getAlertTypeId(),
            $filter->getAlertSourceId(),
            $filter->getProductId(),
            $filter->getEntityTypeId(),
            $filter->getEntityId(),
            $filter->getTagKey(),
            $filter->getTagValue(),
            $filter->getComparisonTypeId(),
            $filter->getPercentageOfComparison(),
            $filter->getWithinMonth(),
            $filter->getWithinDay(),
            $filter->getCondition(),
            $filter->getOwnerId(),
            !empty($filter->getEmailCC()) ? implode(',', $filter->getEmailCC()) : null
        ];
    }

    /**
     * @param AlertFilter $filter
     * @return array
     */
    private function filterSuspend(AlertFilter $filter): array
    {
        return [
            $filter->getAlertId()
        ];
    }

    /**
     * @param AlertFilter $filter
     * @return array
     */
    private function filterDelete(AlertFilter $filter): array
    {
        return [
            $filter->getAlertId()
        ];
    }

    /**
     * @param AlertFilter $filter
     * @return array
     */
    private function filterUnSuspend(AlertFilter $filter): array
    {
        return [
            $filter->getAlertId()
        ];
    }

    /**
     * @return AlertFilter
     */
    public function getAlertFilter(): AlertFilter
    {
        return new AlertFilter();
    }

}
