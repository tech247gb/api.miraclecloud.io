<?php


namespace App\Exceptions\BusinessUnit;


use App\Contract\Exception\CustomExceptionCodeInterface;
use App\Exceptions\CustomExceptionInterface;

class BusinessUnitDeleteException extends \Exception implements CustomExceptionInterface
{
    /**
     * @var int $errorCode
     */
    private $errorCode;

    public function __construct(int $id)
    {
        $this->errorCode = CustomExceptionCodeInterface::BUSINESS_UNIT_DELETE_EXCEPTION;

        parent::__construct(sprintf('Business unit with id %d not deleted', $id), 404, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
