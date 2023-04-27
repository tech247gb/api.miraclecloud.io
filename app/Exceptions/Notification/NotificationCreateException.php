<?php


namespace App\Exceptions\Notification;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;
use Illuminate\Http\Response;

class NotificationCreateException extends \Exception implements CustomExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * NotificationCreateException constructor.
     */
    public function __construct()
    {
        $this->errorCode = CustomExceptionCodeInterface::NOTIFICATION_CREATE_EXCEPTION;

        parent::__construct('Notification create exception', Response::HTTP_BAD_REQUEST, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
