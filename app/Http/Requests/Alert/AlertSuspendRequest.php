<?php


namespace App\Http\Requests\Alert;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Alert\AlertSuspendValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class AlertSuspendRequest extends FormRequest
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
     * @throws AlertSuspendValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AlertSuspendValidationException(
            ValidationExceptionCodeInterface::ALERT_SUSPEND_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
