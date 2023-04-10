<?php

namespace App\Exceptions\Client;

use App\Exceptions\CustomExceptionInterface;
use Exception;

/**
 * Class ClientSearchExceptions
 * @package App\Domain\User
 */
class ClientSearchExceptions extends Exception implements CustomExceptionInterface
{
    /**
     * @var int $errorCode
     */
    private $errorCode;

    public function __construct(int $id)
    {
        $this->errorCode = 40410;

        parent::__construct(sprintf('Client with id %d not found', $id), 404, null);
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}
