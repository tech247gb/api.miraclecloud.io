<?php

namespace App\Exceptions;


/**
 * Interface NewsRepositoryInterface
 * @package App\Domain
 */
interface CustomExceptionInterface
{
    /**
     * @return int
     */
    public function getErrorCode(): int;

    public function getMessage();

    public function getCode();
}
