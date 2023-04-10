<?php


namespace App\Exceptions\BusinessUnit;


use App\Contract\Exception\CustomExceptionCodeInterface;

class BusinessUnitUpdateException extends \Exception implements CustomExceptionCodeInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    public function __construct(int $id)
    {
        $this->errorCode = CustomExceptionCodeInterface::BUSINESS_UNIT_UPDATE_EXCEPTION;

        parent::__construct(sprintf('Business unit with id %d not updated', $id), 404, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
