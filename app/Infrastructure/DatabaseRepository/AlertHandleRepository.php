<?php

declare(strict_types = 1);

namespace App\Infrastructure\DatabaseRepository;


use App\Domain\AlertHandle\{
    AlertHandle,
    AlertHandleFilter
};
use App\Domain\Dashboard\DbModel;
use Illuminate\Support\Collection;

/**
 * Class AlertHandleRepository
 * @package App\Infrastructure\DatabaseRepository
 *
 * @property DbModel $model
 */
class AlertHandleRepository
{

    /**
     * @var DbModel $model
     */
    private $model;

    /**
     * AlertHandleRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return AlertHandleFilter
     */
    public function getFilter(): AlertHandleFilter
    {
        return new AlertHandleFilter();
    }

    /**
     * @param AlertHandleFilter $alertHandleFilter
     *
     * @return Collection
     */
    public function all(AlertHandleFilter $alertHandleFilter)
    {
        return $this->mapList(
            $this->model->getAlertsHandledList($this->filterListParams($alertHandleFilter))
        );
    }

    /**
     * @param Collection|null $alertsHandled
     *
     * @return Collection
     */
    private function mapList(?Collection $alertsHandled): Collection
    {
        return $alertsHandled->map(function ($alertHandleModel) {

            $alertHandle = new AlertHandle();

            $alertHandle->setRanki($alertHandleModel->ranki);
            $alertHandle->setAlertToHandleId($alertHandleModel->AlertToHandleID);
            $alertHandle->setAlertName($alertHandleModel->AlertName);
            $alertHandle->setAlertTypeName($alertHandleModel->AlertTypeName);
            $alertHandle->setAlertSourceName($alertHandleModel->AlertSourceName);
            $alertHandle->setOwnerName($alertHandleModel->OwnerName);
            $alertHandle->setOwnerEmail($alertHandleModel->OwnerMail);
            $alertHandle->setEmailCC($alertHandleModel->EmailCC);
            $alertHandle->setSendDate($alertHandleModel->SendDate);
            $alertHandle->setStatusName($alertHandleModel->StatusName);
            $alertHandle->setReasonDescription($alertHandleModel->ReasonDescription);
            $alertHandle->setAlertStatusId($alertHandleModel->AlertStatusID);
            $alertHandle->setReasonId($alertHandleModel->ReasonID);
            $alertHandle->setNumberOfItems($alertHandleModel->NumberOfItems);
            $alertHandle->setNumberOfPages($alertHandleModel->NumberOfPages);
            $alertHandle->setCurrentPage($alertHandleModel->CurrentPage);

            return $alertHandle;
        });
    }

    /**
     * @param AlertHandleFilter $alertHandleFilter
     *
     * @return array
     */
    private function filterListParams(AlertHandleFilter $alertHandleFilter): array
    {
        return [
            $alertHandleFilter->getClientId(),
            $alertHandleFilter->getStatusId(),
            $alertHandleFilter->getPage(),
            $alertHandleFilter->getPerPage()
        ];
    }

}
