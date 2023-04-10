<?php


namespace App\Exceptions\Source;


use App\Contract\Exception\ValidationExceptionInterface;

class SourceListValidationException extends \Exception implements ValidationExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * @var array
     */
    private $errors;

    /**
     * @var string
     */
    private $type = 'SourceListValidationException';

    /**
     * SourceListValidationException constructor.
     * @param int $errorCode
     * @param array $errors
     */
    public function __construct(int $errorCode, $errors = [])
    {
        $this->errorCode = $errorCode;
        $this->errors = $errors;

        parent::__construct('Validation Error', 422);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

}
