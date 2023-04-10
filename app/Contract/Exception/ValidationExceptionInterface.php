<?php


namespace App\Contract\Exception;


interface ValidationExceptionInterface
{

    /**
     * @return int
     */
    public function getErrorCode(): int;

    /**
     * @return array
     */
    public function getErrors(): array;

    public function getCode();

}
