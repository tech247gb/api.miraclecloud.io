<?php


namespace App\Exceptions\Resource;


use App\Contract\Exception\ValidationExceptionInterface;
use Illuminate\Http\Response;

class ResourceListValidationException extends \Exception implements ValidationExceptionInterface
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
    private $type = 'ResourceListValidationException';

    /**
     * ResourceListValidationException constructor.
     * @param int $errorCode
     * @param array $errors
     */
    public function __construct(int $errorCode, $errors = [])
    {
        $this->errorCode = $errorCode;
        $this->errors = $errors;

        parent::__construct('Validation Error', Response::HTTP_BAD_REQUEST);
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
