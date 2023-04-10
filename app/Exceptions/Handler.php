<?php

namespace App\Exceptions;

use App\Contract\Exception\ValidationExceptionInterface;
use App\Infrastructure\Response\ErrorResponse;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * @param Exception $exception
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof CustomExceptionInterface) {

            return $this->exceptionMessage($exception);
        }

        if ($exception instanceof ValidationExceptionInterface) {

            return $this->validationException($exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * @param CustomExceptionInterface $exception
     * @return JsonResponse
     */
    private function exceptionMessage(CustomExceptionInterface $exception)
    {
        return new JsonResponse(
            new ErrorResponse(['code' => $exception->getErrorCode(), 'message' => $exception->getMessage()]),
            $exception->getCode()
        );
    }

    /**
     * @param ValidationExceptionInterface $exception
     * @return JsonResponse
     */
    private function validationException(ValidationExceptionInterface $exception)
    {
        return new JsonResponse(
            [
                'type' => $exception->getType(),
                'errors' => $exception->getErrors(),
                'code' => $exception->getErrorCode(),
            ],
            $exception->getCode()
        );
    }
}
