<?php


namespace App\Application\Notification\NotificationCreate;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\NotificationRepositoryInterface;
use App\Domain\Notification\NotificationFilter;
use App\Exceptions\Notification\NotificationCreateException;

class NotificationCreateHandler extends HandlerBase
{

    /**
     * @var NotificationRepositoryInterface $notificationRepository
     */
    protected $notificationRepository;

    /**
     * NotificationListHandler constructor.
     * @param NotificationRepositoryInterface $notificationRepository
     */
    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * @param NotificationCreate|CommandInterface $command
     * @throws NotificationCreateException
     */
    protected function work(CommandInterface $command)
    {

        if (!$this->notificationRepository->create($this->getFilter($command))) {

            throw new NotificationCreateException();
        }
    }

    /**
     * @param NotificationCreate $command
     * @return NotificationFilter
     */
    private function getFilter(NotificationCreate $command): NotificationFilter
    {
        return $this->notificationRepository->getNotificationFilter()
            ->setUserID($command->getUserID())
            ->setNotificationTitle($command->getNotificationTitle())
            ->setNotificationType($command->getNotificationType())
            ->setAddedBy($command->getAddedBy())
            ->setSeen($command->getSeen())
            ->setredirecturl($command->getredirecturl());
    }

}
