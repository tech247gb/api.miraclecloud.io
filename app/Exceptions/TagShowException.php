<?php

declare(strict_types = 1);


namespace App\Exceptions;


use App\Contract\Exception\CustomExceptionCodeInterface;
use Illuminate\Http\Response;

/**
 * Class TagShowException
 * @package App\Exceptions
 */
class TagShowException extends \Exception implements CustomExceptionInterface
{

    /**
     * @var int $errorCode
     */
    private $errorCode;

    /**
     * TagShowException constructor.
     * @param string $tagKey
     */
    public function __construct(string $tagKey)
    {
        $this->errorCode = CustomExceptionCodeInterface::TAG_SHOW_EXCEPTION;

        parent::__construct(
            sprintf('Tag with tag key %s not found', $tagKey),
            Response::HTTP_BAD_REQUEST,
            null
        );
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
