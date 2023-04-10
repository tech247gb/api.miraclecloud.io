<?php

namespace App\Exceptions;

use App\Contract\Exception\ValidationExceptionInterface;
use Throwable;

/**
 * Class RequestValidationException
 * @package App\Exceptions
 *
 * @property int $errorCode
 * @property array $errors
 */
class RequestValidationException extends \Exception implements ValidationExceptionInterface
{
    /**
     * @var int
     */
    private $errorCode;

    /**
     * @var array
     */
    private $errors;

    /**
     * RequestValidationException constructor.
     * @param int $errorCode
     * @param array $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(int $errorCode, array $message = [], int $code = 0, Throwable $previous = null)
    {
        parent::__construct("", $code, $previous);
        $this->errorCode = $errorCode;
        $this->errors = $message;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public static function getClass(int $errorCode, array $message , Throwable $previous = null)
    {
        return new self(
            $errorCode,
            $message,
            422,
            $previous
        );
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getType(): string
    {
        return 'ValidationError';
    }

}
