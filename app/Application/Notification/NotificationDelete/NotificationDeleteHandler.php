<?php


namespace App\Application\Notification\NotificationDelete;


use App\Application\Core\HandlerBase;
use App\Contract\CommandBus\CommandInterface;
use App\Contract\Repository\NotificationRepositoryInterface;
use App\Domain\Notification\NotificationFilter;
use App\Exceptions\Notification\NotificationDeleteException;

class NotificationDeleteHandler extends HandlerBase
{

    /**
     * @var NotificationRepositoryInterface $NotificationRepository
     */
    protected $NotificationRepository;

    /**
     * NotificationDeleteHandler constructor.
     * @param NotificationRepositoryInterface $NotificationRepository
     */
    public function __construct(NotificationRepositoryInterface $NotificationRepository)
    {
        $this->NotificationRepository = $NotificationRepository;
    }

    /**
     * @param NotificationDelete|CommandInterface $command
     * @throws NotificationDeleteException
     */
    protected function work(CommandInterface $command)
    {

        if (!$this->NotificationRepository->delete($this->getFilter($command))) {

            throw new NotificationDeleteException();
        }
    }

    /**
     * @param NotificationDelete $command
     * @return NotificationFilter
     */
    private function getFilter(NotificationDelete $command)
    {
        return $this->NotificationRepository->getNotificationFilter()->setNotificationId($command->getId());
    }

}
