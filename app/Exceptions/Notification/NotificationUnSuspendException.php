<?php


namespace App\Exceptions\Notification;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;

class NotificationUnSuspendException extends \Exception implements CustomExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * NotificationUnSuspendException constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->errorCode = CustomExceptionCodeInterface::Notification_UNSUSPEND_EXCEPTION;

        parent::__construct(sprintf('Notification with id %d not unsuspend', $id), 404, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
