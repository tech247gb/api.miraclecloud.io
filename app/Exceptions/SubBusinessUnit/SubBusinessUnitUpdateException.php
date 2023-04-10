<?php


namespace App\Exceptions\SubBusinessUnit;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;

class SubBusinessUnitUpdateException extends \Exception implements CustomExceptionInterface
{
    /**
     * @var int $errorCode
     */
    private $errorCode;

    public function __construct(int $id)
    {
        $this->errorCode = CustomExceptionCodeInterface::SUB_BUSINESS_UNIT_UPDATE_EXCEPTION;

        parent::__construct(sprintf('Sub business unit with id %d not updated', $id), 404, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
