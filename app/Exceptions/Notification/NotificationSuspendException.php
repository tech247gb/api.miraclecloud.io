<?php


namespace App\Exceptions\Notification;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;

class NotificationSuspendException extends \Exception implements CustomExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * NotificationSuspendException constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->errorCode = CustomExceptionCodeInterface::Notification_SUSPEND_EXCEPTION;

        parent::__construct(sprintf('Notification with id %d not suspend', $id), 404, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
