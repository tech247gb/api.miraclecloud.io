<?php


namespace App\Contract\Repository;



use App\Domain\Notification\NotificationFilter;
use Illuminate\Support\Collection;

interface NotificationRepositoryInterface
{

    /**
     * @param NotificationFilter $filter
     * @return Collection
     */
    public function all(NotificationFilter $filter): Collection;

    /**
     * @return NotificationFilter
     */
    public function getNotificationFilter(): NotificationFilter;

    /**
     * @param NotificationFilter $filter
     * @return bool
     */


    /**
     * @param NotificationFilter $filter
     * @return bool
     */
    public function create(NotificationFilter $filter): bool;

    /**
     * @param NotificationFilter $filter
     * @return bool
     */
    public function delete(NotificationFilter $filter): bool;

    /**
     * @return Collection
     */
    

}
