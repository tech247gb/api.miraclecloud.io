<?php


namespace App\Exceptions\Alert;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;
use Illuminate\Http\Response;

class AlertCreateException extends \Exception implements CustomExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * AlertCreateException constructor.
     */
    public function __construct()
    {
        $this->errorCode = CustomExceptionCodeInterface::ALERT_CREATE_EXCEPTION;

        parent::__construct('Alert create exception', Response::HTTP_BAD_REQUEST, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
