<?php


namespace App\Exceptions\Alert;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;

class AlertSuspendException extends \Exception implements CustomExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * AlertSuspendException constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->errorCode = CustomExceptionCodeInterface::ALERT_SUSPEND_EXCEPTION;

        parent::__construct(sprintf('Alert with id %d not suspend', $id), 404, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
