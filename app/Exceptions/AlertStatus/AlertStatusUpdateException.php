<?php

declare(strict_types = 1);

namespace App\Exceptions\AlertStatus;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;
use Exception;
use Illuminate\Http\Response;

/**
 * Class AlertStatusUpdateException
 * @package App\Exceptions\AlertStatus
 *
 * @property int $errorCode
 */
class AlertStatusUpdateException extends Exception implements CustomExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * AlertStatusUpdateException constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->errorCode = CustomExceptionCodeInterface::ALERT_STATUS_UPDATE;

        parent::__construct(
            sprintf('Alert status with alertId %d not updated', $id),
            Response::HTTP_BAD_REQUEST,
            null
        );
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
