<?php


namespace App\Http\Requests\Alert;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Alert\AlertUnSuspendValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class AlertUnSuspendRequest extends FormRequest
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
            'alertId' => 'required|integer',
        ];
    }

    /**
     * @param Validator $validator
     * @throws AlertUnSuspendValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AlertUnSuspendValidationException(
            ValidationExceptionCodeInterface::ALERT_UNSUSPEND_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
