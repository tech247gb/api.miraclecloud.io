<?php


namespace App\Exceptions\Alert;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;

class AlertUnSuspendException extends \Exception implements CustomExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * AlertUnSuspendException constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->errorCode = CustomExceptionCodeInterface::ALERT_UNSUSPEND_EXCEPTION;

        parent::__construct(sprintf('Alert with id %d not unsuspend', $id), 404, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
