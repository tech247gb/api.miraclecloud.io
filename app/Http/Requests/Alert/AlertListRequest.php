<?php


namespace App\Http\Requests\Alert;


use App\Contract\Exception\ValidationExceptionCodeInterface;
use App\Exceptions\Alert\AlertListValidationException;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

class AlertListRequest extends FormRequest
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
            'clientId' => 'required|integer'
        ];
    }

    /**
     * @param Validator $validator
     * @throws AlertListValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new AlertListValidationException(
            ValidationExceptionCodeInterface::ALERT_LIST_VALIDATION_EXCEPTION,
            $validator->errors()->messages()
        );
    }

}
