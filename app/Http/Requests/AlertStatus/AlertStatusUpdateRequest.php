<?php

declare(strict_types = 1);

namespace App\Http\Requests\AlertStatus;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Domain\AlertHandle\AlertHandle;
use App\Exceptions\RequestValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Urameshibr\Requests\FormRequest;

/**
 * Class AlertStatusUpdateRequest
 * @package App\Http\Requests\AlertStatus
 */
class AlertStatusUpdateRequest extends FormRequest
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
            'statusId' => 'required|integer|in:' . implode(',', self::getAvailableAlertHandleStatuses()),
            'reasonId' => 'required|integer',
            'userId' => 'required|integer',
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
            ValidationExceptionCodeInterface::ALERT_STATUS_UPDATE_VALIDATION_EXCEPTION,
            $validator->errors()->messages(),
            Response::HTTP_BAD_REQUEST
        );
    }

}
