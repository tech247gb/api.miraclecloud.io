<?php


namespace App\Exceptions\Alert;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;
use Illuminate\Http\Response;

class AlertDeleteException extends \Exception implements CustomExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * AlertDeleteException constructor.
     */
    public function __construct()
    {
        $this->errorCode = CustomExceptionCodeInterface::ALERT_DELETE_EXCEPTION;

        parent::__construct('Alert delete exception', Response::HTTP_BAD_REQUEST, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
