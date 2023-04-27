<?php


namespace App\Infrastructure\DatabaseRepository;


use App\Contract\Repository\NotificationRepositoryInterface;
use App\Domain\Notification\NotificationFilter;
use App\Domain\Notification\Notification;
use App\Domain\Dashboard\DbModel;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class NotificationRepository implements NotificationRepositoryInterface
{

    /** @var DbModel $model */
    private $model;

    /**
     * NotificationRepository constructor.
     * @param DbModel $model
     */
    public function __construct(DbModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param NotificationFilter $filter
     * @return Collection
     */
    public function all(NotificationFilter $filter): Collection
    {
        return $this->mapList($this->model->getNotificationList($this->filterAll($filter)));
    }

    public function create(NotificationFilter $filter): bool
    {
        $data = $this->model->createNotification($this->filterCreate($filter));

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
        return $this->model->getNotificationTypesDescriptions();
    }

    /**
     * @param Collection $Notifications
     * @return Collection
     */
    private function mapList(Collection $Notifications): Collection
    {

        return $Notifications->map(function ($Notification) {
            $NotificationModel = new Notification();
            $NotificationModel->setNtfID($Notification->NtfID);
            $NotificationModel->setNotificationTitle($Notification->NotificationTitle);
            $NotificationModel->setNotificationDesc($Notification->NotificationDesc);
            $NotificationModel->setUserID($Notification->UserID);
            $NotificationModel->setAddedBy($Notification->AddedBy);
            $NotificationModel->setredirecturl($Notification->redirecturl);
            $NotificationModel->setSeen($Notification->Seen);
            return $NotificationModel;
        });

    }

    /**
     * @param NotificationFilter $filter
     * @return bool
     */
    public function suspend(NotificationFilter $filter): bool
    {
        $data = $this->model->suspendNotification($this->filterSuspend($filter));

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
     * @param NotificationFilter $filter
     * @return bool
     */
    public function unSuspend(NotificationFilter $filter): bool
    {
        $data = $this->model->unSuspendNotification($this->filterUnSuspend($filter));

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
     * @param NotificationFilter $filter
     * @return bool
     */
    public function delete(NotificationFilter $filter): bool
    {
        $data = $this->model->deleteNotification($this->filterDelete($filter));

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
     * @param NotificationFilter $filter
     * @return Collection
     */
    // public function getExportExcelList(NotificationFilter $filter): Collection
    // {
    //     return $this->mapExportExcelList($this->model->getNotificationsList($this->filterExportExcel($filter)));
    // }

    /**
     * @param NotificationFilter $filter
     * @return array
     */
    // private function filterExportExcel(NotificationFilter $filter): array
    // {
    //     return [
    //         $filter->getUserID(),
    //         implode(',', $filter->getNotificationIds())
    //     ];
    // }

    /**
     * @param Collection $Notifications
     * @return Collection
     */
    // private function mapExportExcelList(Collection $Notifications): Collection
    // {
    //     return $Notifications->map(function ($Notification) {

    //         return [
    //             $Notification->NotificationTitle,
    //             $Notification->NotificationTypeName,
    //             $Notification->redirecturl,
    //             $Notification->OwnerName,
    //             $Notification->OwnerMail,
    //             $Notification->Condition,
    //             date('d/m/Y', strtotime($Notification->CreationDate)),
    //             $Notification->StatusName
    //         ];

    //     });
    // }

    /**
     * @param NotificationFilter $filter
     * @return Collection
     */
    // public function getNotificationServiceList(NotificationFilter $filter): Collection
    // {
    //     return $this->model->getNotificationServiceList($this->filterServiceList($filter));
    // }

    /**
     * @param NotificationFilter $filter
     * @return array
     */
    private function filterServiceList(NotificationFilter $filter): array
    {
        return [
            $filter->getProductId()
        ];
    }

    /**
     * @param NotificationFilter $filter
     * @return array
     */
    private function filterAllList(NotificationFilter $filter): array
    {
        return [
            $filter->getUserID(),
            $filter->getSeen(),
        ];
    }

    /**
     * @param NotificationFilter $filter
     * @return array
     */
    private function filterCreate(NotificationFilter $filter): array
    {
        return [
            $filter->getUserID(),
            $filter->getNotificationTitle(),
            $filter->getNotificationType(),
            $filter->getAddedBy(),
            $filter->getSeen(),
            $filter->getredirecturl(),
           
        ];
    }

    /**
     * @param NotificationFilter $filter
     * @return array
     */
    private function filterSuspend(NotificationFilter $filter): array
    {
        return [
            $filter->getNotificationId()
        ];
    }

    /**
     * @param NotificationFilter $filter
     * @return array
     */
    private function filterDelete(NotificationFilter $filter): array
    {
        return [
            $filter->getNotificationId()
        ];
    }

    /**
     * @param NotificationFilter $filter
     * @return array
     */
    private function filterUnSuspend(NotificationFilter $filter): array
    {
        return [
            $filter->getNotificationId()
        ];
    }

    /**
     * @return NotificationFilter
     */
    public function getNotificationFilter(): NotificationFilter
    {
        return new NotificationFilter();
    }

}
