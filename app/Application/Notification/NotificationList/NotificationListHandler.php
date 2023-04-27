<?php


namespace App\Application\Notification\NotificationList;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\NotificationRepositoryInterface;
use App\Domain\Notification\NotificationFilter;
use Illuminate\Support\Collection;

class NotificationListHandler extends HandlerBase
{

    /**
     * @var NotificationRepositoryInterface
     */
    protected $NotificationRepository;

    /**
     * NotificationListHandler constructor.
     * @param NotificationRepositoryInterface $NotificationRepository
     */
    public function __construct(NotificationRepositoryInterface $NotificationRepository)
    {
        $this->NotificationRepository = $NotificationRepository;
    }

    /**
     * @param NotificationList|CommandInterface $command
     * @return Collection
     */
    protected function work(CommandInterface $command): Collection
    {
        return $this->NotificationRepository->all(
            $this->getFilter($command)
        );
    }

    /**
     * @param NotificationList $command
     * @return NotificationFilter
     */
    private function getFilter(NotificationList $command): NotificationFilter
    {
        return $this->NotificationRepository->getNotificationFilter()->setUserID($command->getUserID());
    }

}
