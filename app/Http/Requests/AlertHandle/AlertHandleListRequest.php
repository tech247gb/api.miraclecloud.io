<?php

declare(strict_types = 1);

namespace App\Http\Requests\AlertHandle;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Domain\AlertHandle\AlertHandle;
use App\Exceptions\RequestValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Urameshibr\Requests\FormRequest;

/**
 * Class AlertHandleListRequest
 * @package App\Http\Requests\AlertHandle
 */
class AlertHandleListRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'page' => 'integer',
            'perPage' => 'integer',
            'clientId' => 'required|integer',
            'statusId' => 'integer|in:' . implode(',', self::getAvailableAlertHandleStatuses())
        ];
    }

    /**
     * @return array
     */
    private static function getAvailableAlertHandleStatuses(): array
    {
        return [
            AlertHandle::STATUS_OPEN,
            AlertHandle::STATUS_CLOSED,
            AlertHandle::STATUS_REJECTED,
            AlertHandle::STATUS_HANDLED
        ];
    }

    /**
     * @param Validator $validator
     *
     * @throws RequestValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new RequestValidationException(
            ValidationExceptionCodeInterface::ALERT_HANDLE_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages(),
            Response::HTTP_BAD_REQUEST
        );
    }

}
