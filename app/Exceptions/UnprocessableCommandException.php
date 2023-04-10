<?php

namespace App\Exceptions;

use Throwable;

class UnprocessableCommandException extends \Exception implements CustomExceptionInterface
{
    /**
     * @var int
     */
    private $errorCode;

    public function __construct(int $errorCode, string $message = "", int $code = 0, Throwable $previous = null)
    {
        $this->errorCode = $errorCode;

        parent::__construct($message, $code, $previous);
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public static function getClass(int $errorCode, Throwable $previous = null)
    {
        return new self(
            $errorCode,
            'Not valid data',
            422,
            $previous
        );
    }

    public function getType(): string
    {
        return 'UnprocessableError';
    }

}
