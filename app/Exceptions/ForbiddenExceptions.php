<?php

namespace App\Exceptions;

use Exception;

/**
 * Class ForbiddenExceptions
 * @package App\Exceptions\Client
 */
class ForbiddenExceptions extends Exception implements CustomExceptionInterface
{
    /**
     * @var int $errorCode
     */
    private $errorCode;

    public function __construct(int $errorCode)
    {
        $this->errorCode = $errorCode;

        parent::__construct('You are not allowed to this action', 403, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}
