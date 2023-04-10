<?php


namespace App\Exceptions;

use Throwable;

/**
 * Class NotLoginSocialAuth
 * @package App\Exceptions
 */
class UnauthorizedException extends \Exception implements CustomExceptionInterface
{
    /**
     * @var int
     */
    private $errorCode;

    public function __construct(int $errorCode, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->errorCode = $errorCode;

        parent::__construct($message, $code, $previous);
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}
